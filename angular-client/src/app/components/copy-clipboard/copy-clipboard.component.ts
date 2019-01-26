import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'copy-clipboard',
  templateUrl: './copy-clipboard.component.html',
  styleUrls: ['./copy-clipboard.component.css']
})
export class CopyClipboardComponent implements OnInit {
  @Input() buttonType: string; // link or button
  @Input() target: string;
  @Input() text: string;
  
  copied: boolean = false;

  constructor() { }

  ngOnInit() {
    if (!this.buttonType) {
      this.buttonType = 'link';
    }
  }

  copyMessage() {
    let selBox = document.createElement('textarea');
    selBox.style.opacity = '0';
    selBox.value = this.target;
    document.body.appendChild(selBox);
    selBox.select();
    document.execCommand('copy');
    document.body.removeChild(selBox);
    console.log(this.target + ' copied to clipboard');
    this.copied = true;
    var timer = setInterval(() => {
      this.copied = false;
      clearInterval(timer);
    }, 2000);
  }
}
