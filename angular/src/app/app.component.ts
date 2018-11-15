import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient, HttpParams } from "@angular/common/http";
import { MatSnackBar, MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  
  /* --------------------------------------------
  *       Variable Define
  -------------------------------------------- */
  private RESTUrl = '/api/angluar'; // api url path
  isLoading = false;                // is loading data from server
  curhero = { id: 0, name: '' };    // current edit hero
  isEdit = false;                   // current edit status
  name = '';                        // new hero name
  
  heroes = [
    { id: 1, name: 'Yang' },
    { id: 2, name: 'Jack' },
  ];


  /* --------------------------------------------
  *       System Function
  -------------------------------------------- */
  constructor(
    private http: HttpClient,
    public snackBar: MatSnackBar,
    public dialog: MatDialog,
    ) { }

  ngOnInit() {
    this.read();
  }
  

  /* --------------------------------------------
  *       CRUD Function
  -------------------------------------------- */
  create() {
    this.isEdit = false;
    
    this.name = this.name.replace(/\s/g, "");
    if(this.name == ''){
      this.snackBar.open('Hero name cannot be empty!', 'Close', {
        duration: 3000,
      });
      return;
    }
    
    let id = 1;
    let heroes = this.heroes;
    let name = this.name;
    heroes.forEach(function(item, key) {
      if (item.id >= id) {
        id = item.id + 1;
      }
    });
    let params = new HttpParams();
    params = params.append('type', 'HERO_CREATE');
    params = params.append('id', id.toString());
    params = params.append('name', name);
    this.isLoading = true;
    this.http.post(this.RESTUrl, params)
      .subscribe(res => {
        console.log(res);
        this.name = '';
        this.read();
      }, error => {
        console.log(error);
      });
  }

  read() {
    let params = new HttpParams();
    params = params.append('type', 'HERO_READ');

    this.isLoading = true;
    this.http.post(this.RESTUrl, params)
      .subscribe(res => {
        console.log(res);
        if ('heroes' in res) {
          this.heroes = res['heroes'];
        }
        this.isLoading = false;
      });
  }

  update(){
    let params = new HttpParams();
    params = params.append('type', 'HERO_UPDATE');
    params = params.append('id', this.curhero.id.toString());
    params = params.append('name', this.curhero.name);
    this.isLoading = true;
    this.http.post(this.RESTUrl, params)
      .subscribe(res => {
        console.log(res);
        this.read();
        this.isEdit = false;
      }, error => {
        console.log(error);
      });
  }

  delete(obj) {
    this.isEdit = false;
    const dialogRef = this.dialog.open(DialogConfirm, {
      width: '350px',
      data: {strname: 'This will permanently delete her！',}
    });

    dialogRef.afterClosed().subscribe(result => {
      if(result == 999){
        
        let params = new HttpParams();
        params = params.append('type', 'HERO_DELETE');
        params = params.append('id', obj.id);
        this.isLoading = true;
        this.http.post(this.RESTUrl, params)
          .subscribe(res => {
            console.log(res);
            this.read();
          }, error => {
            console.log(error);
          });
          
      }
    });
  }
  
  /* --------------------------------------------
  *       Other Function
  -------------------------------------------- */
  edit(obj) {
    this.curhero = obj;
    this.isEdit = !this.isEdit;
  }
  
  isNotLast(item: any) {
    let obj = this.heroes[this.heroes.length - 1];
    if(obj.id == item.id){
      return false;
    }else{
      return true;
    }
  }
  
  
}


/* --------------------------------------------
*       Dialog Class
-------------------------------------------- */
export interface DialogData {
  strname: string;
  result: string;
}
@Component({
  selector: 'dialog-confirm',
  templateUrl: 'dialog-confirm.html',
})
export class DialogConfirm {

  constructor(
    public dialogRef: MatDialogRef<DialogConfirm>,
    @Inject(MAT_DIALOG_DATA) public data: DialogData) {}

  onNoClick(): void {
    this.dialogRef.close();
  }

}