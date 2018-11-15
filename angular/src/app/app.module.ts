import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from "@angular/forms";
import { CustomMaterialModule } from './custom-material/custom-material.module';

import { AppComponent, DialogConfirm } from './app.component';

import 'hammerjs';

@NgModule({
  declarations: [
    AppComponent,
    DialogConfirm,
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    BrowserAnimationsModule,
    CustomMaterialModule,
  ],
  entryComponents:[
    DialogConfirm,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
