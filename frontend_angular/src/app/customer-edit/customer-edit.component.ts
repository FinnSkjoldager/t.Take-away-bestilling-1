import { Component, OnInit, Inject } from "@angular/core";
import { MAT_DIALOG_DATA, MatDialogRef } from "@angular/material";
import { NgForm } from "@angular/forms";
import { CustomerComponent } from "../customer/customer.component";
import { CustomerService } from "../shared/customer.service";
import { Customer } from "../shared/customer.model";
import { ToastrService } from "ngx-toastr";

@Component({
  selector: "app-customer-edit",
  templateUrl: "./customer-edit.component.html",
})
export class CustomerEditComponent implements OnInit {
  constructor(
    @Inject(MAT_DIALOG_DATA) public data: Customer,
    public dialogRef: MatDialogRef<CustomerComponent>,
    public service: CustomerService,
    public toastr: ToastrService,
    ) {}

  ngOnInit() {
    this.service.formData = new Customer();
    this.service.formData.id = -1;
    this.service.formData.Name = "";
    //console.log("## open dia data " + this.data+" "+(this.data == null));
    if (this.data != null) {
      this.service.formData.id = this.data.id;
      this.service.formData.Name = this.data.Name;
    }
    //console.log("## open dia " + this.service.formData.id + " " + this.service.formData.Name);
  }
  onSubmit(form: NgForm) {
   //console.log("##onSubmi customer");
    this.service.saveOrUpdateCustomer().subscribe((res) => {
      //console.log("## Customer after POST "+JSON.stringify(res));
      this.toastr.success("Gemt korrekt !", "Restaurent App.");
      this.dialogRef.close();
    });
  }
}
