import { Component, OnInit } from "@angular/core";
import { Customer } from "../shared/customer.model";
import { CustomerService } from "../shared/customer.service";
import { MatDialog, MatDialogConfig } from "@angular/material/dialog";
import { CustomerEditComponent } from "../customer-edit/customer-edit.component";
import { ToastrService } from "ngx-toastr";

@Component({
  selector: "app-customer",
  templateUrl: "./customer.component.html",
})
export class CustomerComponent implements OnInit {
  customerList: Customer[];
  dialogConfigWidth = "400px";
  constructor(
    private customerService: CustomerService,
    private dialog: MatDialog,
    private toastr: ToastrService
  ) {}

  ngOnInit() {
    this.loadData();
  }
  loadData() {
    this.customerService
      .getCustomerList()
      .then((res) => (this.customerList = res as Customer[]
        //,console.log("## list length " + this.customerList.length)
    ));
  }
  onAddOrEditCustomer(parmId, i) {
    //console.log("## Add start ");
    const dialogConfig = new MatDialogConfig();
    dialogConfig.autoFocus = true;
    dialogConfig.disableClose = true;
    dialogConfig.width = this.dialogConfigWidth;
    for (let i = 0; i < this.customerList.length; i++) {
      let item: Customer = this.customerList[i];
      if (item.id == parmId) {
        let id = item.id;
        let Name = item.Name;
        dialogConfig.data = { id, Name };
        break;
      }
    }
    //console.log("## add Open " + JSON.stringify(dialogConfig.data));
    this.dialog
      .open(CustomerEditComponent, dialogConfig)
      .afterClosed()
      .subscribe((res) => {
        //console.log("## After save " + res);
        this.loadData();
      });
  }
  onDeleteCustomer(id: number, i: number) {
    if (confirm("Er du sikke du vil slette retten ?")) {
      this.customerService.deleteCustomer(id).subscribe((res) => {
        this.toastr.success("Slettet korrekt !", "Restaurent App."),
        //console.log("## After delete " + JSON.stringify(res)); 
         this.loadData();     
      });
    }
  }
}
