import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { 
  MatButtonModule, 
  MatCheckboxModule, 
  MatInputModule, 
  MatIconModule, 
  MatListModule, 
  MatChipsModule,
  MatSnackBarModule,
  MatDialogModule,
  MatProgressSpinnerModule,

} from '@angular/material';

@NgModule({
  imports: [
    CommonModule,
    MatButtonModule,
    MatCheckboxModule,
    MatInputModule,
    MatIconModule,
    MatListModule,
    MatChipsModule,
    MatSnackBarModule,
    MatDialogModule,
    MatProgressSpinnerModule,

  ],
  exports: [
    MatButtonModule,
    MatCheckboxModule,
    MatInputModule,
    MatIconModule,
    MatListModule,
    MatChipsModule,
    MatSnackBarModule, 
    MatDialogModule,
    MatProgressSpinnerModule,

  ],
  declarations: []
})
export class CustomMaterialModule {
}
