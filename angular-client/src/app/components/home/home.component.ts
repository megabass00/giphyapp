import { Component, OnInit, ElementRef, ViewChild } from '@angular/core';
import { TagsService } from '../../services/tags.service'
import { GiphiesService } from 'src/app/services/giphies.service';
import { Tag } from '../../interfaces/tag'
import { Giphy } from 'src/app/interfaces/giphy';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
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
    if (event.target.value && event.target.value.length < 3) return;
    this.searching = true;
    this.searchTextField.nativeElement.disabled = true;
    this.giphiesService.searchGiphies(event.target.value)
      .subscribe(data => {
        this.searching = false;
        this.results = data.results;
        // console.log(data.results);
        this.searchTextField.nativeElement.disabled = false;
        this.searchTextField.nativeElement.focus();
        console.log(this.results.length+' results for "'+data.term+'"');
      });
  }

  tagChanged(event: any, tag: Tag) {
    if (event.target.checked) {
      this.tagsSelected.push(tag);
    }else{
      var selectedId = tag.id;
      const index = this.tagsSelected.findIndex(tag => tag.id === selectedId);
      this.tagsSelected.splice(index, 1);
    }
  }

}
