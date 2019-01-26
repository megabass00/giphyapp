import { Component, OnInit, ElementRef, ViewChild } from '@angular/core';
import { trigger, state, style, animate, transition, keyframes } from '@angular/animations'

import { TagsService } from '../../services/tags.service'
import { GiphiesService } from 'src/app/services/giphies.service';
import { Tag } from '../../interfaces/tag'
import { Giphy } from 'src/app/interfaces/giphy';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css'],
  animations: [
    trigger('fadeIn', [
      state('void', style({
        transform: 'scale(0.1)',
        opacity: 0
      })),
      transition(':enter', [
        animate(800, keyframes([
          style({offset:0, transform: 'scale(.1)', opacity: '0'}),
          style({offset:0.25, transform: 'scale(1.1)', opacity: '0.6'}),
          style({offset:0.45, transform: 'scale(0.93)', opacity: '1'}),
          style({offset:0.7, transform: 'scale(1.04)', opacity: '1'}),
          style({offset:1, transform: 'scale(1)', opacity: '1'}),
        ]))
      ])
    ])
  ]
})
export class HomeComponent implements OnInit {
  @ViewChild('searchTextField') private searchTextField: ElementRef;

  results: Giphy[] = [];
  searching: boolean = false;
  tags: Tag[] = [];
  tagsSelected: Tag[] = [];
  tagsLoading: boolean;

  constructor(private tagsService: TagsService, private giphiesService: GiphiesService) { }

  ngOnInit() {
    this.searchTextField.nativeElement.focus();
    this.tagsLoading = true;
    this.tagsService.getTags()
      .subscribe(
        data => {
          this.tags = data;
          this.tagsLoading = false;
        }
      )
  }


  searchTextChanged(event: any) {
    if (event.key !== 'Enter') return;
    if (event.target.value && event.target.value.length < 3) return;
    this.searching = true;
    this.searchTextField.nativeElement.disabled = true;
    this.results = [];
    this.giphiesService.searchGiphies(event.target.value)
      .throttleTime(2000)
      .subscribe(data => {
        this.searching = false;
        // this.results = data.results;
        this.loadResultsWithDelay(data.results, 200);
        this.searchTextField.nativeElement.disabled = false;
        this.searchTextField.nativeElement.focus();
        console.log(this.results.length+' results for "'+data.term+'"');
      });
  }

  loadResultsWithDelay(data: [], delay: number) {
    this.results = [];
    var index = 1;
    var timer = setInterval(() => {
      if (index < data.length) {
         this.results.push(data[index]);
         index++;
      } else { 
         clearInterval(timer);
      }
    }, delay);
  }

  tagChanged(event: any, tag: Tag) {
    console.log(event);
    if (event.target.checked) {
      this.tagsSelected.push(tag);
    }else{
      var selectedId = tag.id;
      const index = this.tagsSelected.findIndex(tag => tag.id === selectedId);
      this.tagsSelected.splice(index, 1);
    }
  }

}
