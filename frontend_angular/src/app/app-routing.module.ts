import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { OrdersComponent } from './orders/orders.component';
import { OrderComponent } from './orders/order/order.component';
import { CustomerComponent } from './customer/customer.component';
import { ItemComponent } from './item/item.component';

const routes: Routes = [
  {path:'',redirectTo:'order',pathMatch:'full'},
  {path:'orders',component:OrdersComponent},
  {path:'order',children:[
    {path:'',component:OrderComponent},  
    {path:'edit/:id',component:OrderComponent}
  ]},
  {path:'customer',component:CustomerComponent},
  {path:'item',component:ItemComponent},
 ;

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
