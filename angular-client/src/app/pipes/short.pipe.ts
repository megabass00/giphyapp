import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'short'
})
export class ShortPipe implements PipeTransform {

  transform(value: string, maxChars: number=80): any {
    if (value.length > maxChars) {
      return value.substring(0, maxChars)+'...';
    }
    return value;
  }

}
