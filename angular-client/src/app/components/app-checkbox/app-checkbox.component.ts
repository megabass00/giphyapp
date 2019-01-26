import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { text } from '@angular/core/src/render3';

@Component({
  selector: 'app-checkbox',
  templateUrl: './app-checkbox.component.html',
  styleUrls: ['./app-checkbox.component.css']
})
export class AppCheckboxComponent implements OnInit {
  @Input() text: string;
  @Input() checked: boolean;
  @Input() disabled: boolean;

  @Output() change: EventEmitter<any> = new EventEmitter();

  constructor() { }

  ngOnInit() {
  }

  onChange(event: any) {
    if (!event || event.type !== 'change') return;
    this.change.emit(event);
  }
}
