
import {
  ClickEvent,
  HoverRatingChangeEvent,
  RatingChangeEvent
} from 'angular-star-rating';
import { Component, OnInit, Input } from '@angular/core';
import { GiphiesService } from '../../services/giphies.service'

@Component({
  selector: 'rating',
  templateUrl: './rating.component.html',
  styleUrls: ['./rating.component.css']
})
export class RatingComponent implements OnInit {
  @Input() id: number;
  @Input() value: number;
  @Input() disabled: boolean;

  ratingSended: boolean = false;
  sending: boolean = false;

  onClickResult: ClickEvent;
  onHoverRatingChangeResult: HoverRatingChangeEvent;
  onRatingChangeResult: RatingChangeEvent;
  

  constructor(private ws: GiphiesService) { }

  ngOnInit() {
  }
 
 

  onClick = ($event: ClickEvent) => {
    // console.log('onClick $event: ', $event);
    this.onClickResult = $event;
    this.disabled = true;
    this.sending = true;
    this.ratingSended = false;
    this.ws.sendRating(this.id, $event.rating)
      .subscribe(
        data => {
          console.log(data);
          this.disabled = false;
          this.ratingSended = true;
          this.sending = false;
        }
      );
  };

  onRatingChange = ($event: RatingChangeEvent) => {
    // console.log('onRatingUpdated $event: ', $event);
    this.onRatingChangeResult = $event;
  };

  onHoverRatingChange = ($event: HoverRatingChangeEvent) => {
    // console.log('onHoverRatingChange $event: ', $event);
    this.onHoverRatingChangeResult = $event;
  };
}
