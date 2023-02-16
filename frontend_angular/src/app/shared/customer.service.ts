import { HttpClient } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { environment } from "src/environments/environment";
import { Customer } from "./customer.model";

@Injectable({
  providedIn: "root",
})
export class CustomerService {
  formData: Customer;
  constructor(private http: HttpClient) {}

  getCustomerList() {
    return this.http.get(environment.apiURL + "/customer").toPromise();
  }
  saveOrUpdateCustomer() {
    var body = {
      ...this.formData,
    };
    //console.log("Customer POST ");
    //console.log(JSON.stringify(body));
    return this.http.post(environment.apiURL + "/customer", body);
  }
  deleteCustomer(id: number) {
    return this.http.delete(environment.apiURL + "/customer/"+id);
  }
}
