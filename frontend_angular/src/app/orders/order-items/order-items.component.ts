import { Component, OnInit, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from "@angular/material";
import { OrderItem } from 'src/app/shared/order-item.model';
import { OrderComponent } from '../order/order.component';
import { ItemService } from 'src/app/shared/item.service';
import { Item } from 'src/app/shared/item.model';
import { NgForm } from '@angular/forms';
import { OrderService } from 'src/app/shared/order.service';

@Component({
  selector: 'app-order-items',
  templateUrl: './order-items.component.html',
  styles: []
})
export class OrderItemsComponent implements OnInit {
  formData: OrderItem;
  itemList: Item[];
  isValid: boolean = true;
  isEdit: boolean = false

  constructor(
    @Inject(MAT_DIALOG_DATA) public data,
    public dialogRef: MatDialogRef<OrderComponent>,
    private itemService: ItemService,
    private orderSevice: OrderService) { }

  ngOnInit() {
    this.itemService.getItemList().then(res => this.itemList = res as Item[]);
    if (this.data.orderItemIndex == null){
      this.isEdit = false;
      this.formData = {
        id: null,
        OrderID: this.data.OrderID,
        ItemID: 0,
        Name: '',
        Price: 0,
        Quantity: 0,
        Total: 0,
        Paid: ""
      };
    }else{
      this.isEdit = true;
      var item = this.orderSevice.orderItems[this.data.orderItemIndex];
      if (item.ItemID == null)
        item.ItemID = item.id; 
      this.formData = Object.assign({}, item);
      console.log("Cus1 "+item.id);
      console.log("Cus2 "+item.ItemID);
    }
  }

  updatePrice(ctrl) {
    if (ctrl.selectedIndex == 0) {
      this.formData.Price = 0;
      this.formData.Name = '';
    }
    else {
      this.formData.Price = this.itemList[ctrl.selectedIndex - 1].Price;
      this.formData.Name = this.itemList[ctrl.selectedIndex - 1].Name;
      //console.log("ITEM 1 "+this.formData.Name);  
    }
    this.updateTotal();
  }

  updateTotal() {
    this.formData.Total = parseFloat((this.formData.Quantity * this.formData.Price).toFixed(2));
  }

  onSubmit(form: NgForm) {
    console.log("##onSubmi order-items");
    if (this.validateForm(form.value)) {
      if (this.data.orderItemIndex == null){
        this.orderSevice.orderItems.push(form.value);
      }else{
        this.orderSevice.orderItems[this.data.orderItemIndex] = form.value;
      }
      this.dialogRef.close();
    }
  }

  validateForm(formData: OrderItem) {
    //console.log("ITEMID "+formData.ItemID);
    //console.log("ITEMNAME "+formData.Name);
    this.isValid = true;
    if (formData.ItemID == 0)
      this.isValid = false;
      else if (formData.Quantity == 0)
      this.isValid = false;
    return this.isValid;
    //service.formData.PMethod
  }

}
