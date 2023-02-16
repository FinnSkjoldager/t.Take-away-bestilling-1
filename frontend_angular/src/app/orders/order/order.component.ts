import { CustomerService } from "./../../shared/customer.service";
import { OrderService } from "./../../shared/order.service";
import { Component, OnInit } from "@angular/core";
import { NgForm } from "@angular/forms";
import { MatDialog, MatDialogConfig } from "@angular/material/dialog";
import { OrderItemsComponent } from "../order-items/order-items.component";
import { Customer } from "src/app/shared/customer.model";
import { ToastrService } from "ngx-toastr";
import { Router, ActivatedRoute } from "@angular/router";
import { BreakpointObserver, BreakpointState } from "@angular/cdk/layout";

@Component({
  selector: "app-order",
  templateUrl: "./order.component.html",
  styles: [],
})
export class OrderComponent implements OnInit {
  customerList: Customer[];
  isValid: boolean = true;
  isEdit: boolean = false;
  dialogConfigWidth = "100";

  constructor(
    private service: OrderService,
    private dialog: MatDialog,
    private customerService: CustomerService,
    private toastr: ToastrService,
    private router: Router,
    private currentRoute: ActivatedRoute,
    private breakpointObserver: BreakpointObserver
  ) {}

  ngOnInit() {
    let orderID = this.currentRoute.snapshot.paramMap.get("id");
    if (orderID == null) {
      this.isEdit = false;
      this.resetForm();
    } else {
      this.isEdit = true;
      this.service.getOrderByID(parseInt(orderID)).then((res) => {
        //console.log("typeof "+typeof(JSON.stringify(res)));
        //console.log("DATA "+JSON.stringify(res['order']));
        this.service.formData = res.order;
        this.service.formData.GTotal = 0;
        for (const item of res.orderDetails) {
          item.Quantity = item.pivot.Quantity;
          item.Paid = item.pivot.Paid;
          item.Total = parseFloat((item.Quantity * item.Price).toFixed(2));
          this.service.formData.GTotal =
            this.service.formData.GTotal + item.Total;
          //console.log(JSON.stringify(item));
        }
        this.service.formData.GTotal = parseFloat(
          this.service.formData.GTotal.toFixed(2)
        );
        this.service.orderItems = res.orderDetails;
      });
    }
    this.customerService
      .getCustomerList()
      .then((res) => (this.customerList = res as Customer[]));
    this.breakpointObserver
      .observe(["(min-width: 500px)"])
      .subscribe((state: BreakpointState) => {
        if (state.matches) {
          console.log("Viewport width is 500px or greater!");
          this.dialogConfigWidth = '400px';
        } else {
          console.log("Viewport width is less than 500px!");
          this.dialogConfigWidth = "99%";
        }
      });
    if (this.breakpointObserver.isMatched("(min-height: 40rem)")) {
      console.log("Viewport has a minimum height of 40rem!");
    }
  }
  resetForm(form?: NgForm) {
    if ((form = null)) form.resetForm();
    //OrderNo: Math.floor(100000 + Math.random() * 900000).toString(),
    this.service.formData = {
      id: null,
      OrderNo: "0",
      CustomerID: 0,
      PMethod: "",
      GTotal: 0,
      DeletedOrderItemIDs: "",
      Paid: ""
    };
    this.service.orderItems = [];
  }

  AddOrEditOrderItem(orderItemIndex, OrderID) {
    // console.log("## Add start ");
    const dialogConfig = new MatDialogConfig();
    dialogConfig.autoFocus = true;
    dialogConfig.disableClose = true;
    dialogConfig.width = this.dialogConfigWidth;
    dialogConfig.data = { orderItemIndex, OrderID };
    // console.log("## add Open ");
    this.dialog
      .open(OrderItemsComponent, dialogConfig)
      .afterClosed()
      .subscribe((res) => {
        //console.log("## Order after POST "+res);
        //console.log("ITEM "+JSON.stringify(this.service.orderItems));
        this.updateGrandTotal();
      });
  }

  onDeleteOrderItem(orderItemID: number, i: number) {
    if (confirm("Er du sikke du vil slette retten ?")) {
      if (orderItemID != null)
        this.service.formData.DeletedOrderItemIDs += orderItemID + ",";
      this.service.orderItems.splice(i, 1);
      this.updateGrandTotal();
    }
  }

  updateGrandTotal() {
    this.service.formData.GTotal = this.service.orderItems.reduce(
      (prev, curr) => {
        return prev + curr.Total;
      },
      0
    );
    this.service.formData.GTotal = parseFloat(
      this.service.formData.GTotal.toFixed(2)
    );
  }

  validateForm() {
    this.isValid = true;
    if (this.service.formData.CustomerID == 0) this.isValid = false;
    else if (this.service.orderItems.length == 0) this.isValid = false;
    return this.isValid;
  }
  reloadPage(){
    window.location.reload()
  }
  onSubmit(form: NgForm) {
    //console.log("## onSubmit order ");
    if (this.validateForm()) {
      this.service.saveOrUpdateOrder().subscribe((res) => {
        console.log("## Order after POST "+JSON.stringify(res));
        this.resetForm();
        this.toastr.success("Gemt korrekt !", "Restaurent App.");
        this.reloadPage();
      });
    }
  }
}
