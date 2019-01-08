/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,uselessCode} checked by tsc
 */
import { Component, ElementRef, HostBinding, Input, Renderer2 } from '@angular/core';
/**
 * Fontawesome layers.
 */
var FaLayersComponent = /** @class */ (function () {
    function FaLayersComponent(renderer, elementRef) {
        this.renderer = renderer;
        this.elementRef = elementRef;
    }
    /**
     * @return {?}
     */
    FaLayersComponent.prototype.ngOnInit = /**
     * @return {?}
     */
    function () {
        this.renderer.addClass(this.elementRef.nativeElement, 'fa-layers');
    };
    /**
     * @param {?} changes
     * @return {?}
     */
    FaLayersComponent.prototype.ngOnChanges = /**
     * @param {?} changes
     * @return {?}
     */
    function (changes) {
        if ('size' in changes) {
            if (changes["size"].currentValue != null) {
                this.renderer.addClass(this.elementRef.nativeElement, "fa-" + changes["size"].currentValue);
            }
            if (changes["size"].previousValue != null) {
                this.renderer.removeClass(this.elementRef.nativeElement, "fa-" + changes["size"].previousValue);
            }
        }
    };
    FaLayersComponent.decorators = [
        { type: Component, args: [{
                    selector: 'fa-layers',
                    template: "<ng-content select=\"fa-icon, fa-layers-text, fa-layers-counter\"></ng-content>"
                }] }
    ];
    /** @nocollapse */
    FaLayersComponent.ctorParameters = function () { return [
        { type: Renderer2 },
        { type: ElementRef }
    ]; };
    FaLayersComponent.propDecorators = {
        size: [{ type: Input }],
        fixedWidth: [{ type: Input }, { type: HostBinding, args: ['class.fa-fw',] }]
    };
    return FaLayersComponent;
}());
export { FaLayersComponent };
if (false) {
    /** @type {?} */
    FaLayersComponent.prototype.size;
    /** @type {?} */
    FaLayersComponent.prototype.fixedWidth;
    /** @type {?} */
    FaLayersComponent.prototype.renderer;
    /** @type {?} */
    FaLayersComponent.prototype.elementRef;
}

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoibGF5ZXJzLmNvbXBvbmVudC5qcyIsInNvdXJjZVJvb3QiOiJuZzovL0Bmb3J0YXdlc29tZS9hbmd1bGFyLWZvbnRhd2Vzb21lLyIsInNvdXJjZXMiOlsibGF5ZXJzL2xheWVycy5jb21wb25lbnQudHMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6Ijs7OztBQUFBLE9BQU8sRUFBRSxTQUFTLEVBQUUsVUFBVSxFQUFFLFdBQVcsRUFBRSxLQUFLLEVBQXFCLFNBQVMsRUFBaUIsTUFBTSxlQUFlLENBQUM7Ozs7O0lBaUJySCwyQkFDVSxVQUNBO1FBREEsYUFBUSxHQUFSLFFBQVE7UUFDUixlQUFVLEdBQVYsVUFBVTtLQUVuQjs7OztJQUVELG9DQUFROzs7SUFBUjtRQUNFLElBQUksQ0FBQyxRQUFRLENBQUMsUUFBUSxDQUFDLElBQUksQ0FBQyxVQUFVLENBQUMsYUFBYSxFQUFFLFdBQVcsQ0FBQyxDQUFDO0tBQ3BFOzs7OztJQUVELHVDQUFXOzs7O0lBQVgsVUFBWSxPQUFzQjtRQUNoQyxJQUFJLE1BQU0sSUFBSSxPQUFPLEVBQUU7WUFDckIsSUFBSSxPQUFPLFNBQU0sWUFBWSxJQUFJLElBQUksRUFBRTtnQkFDckMsSUFBSSxDQUFDLFFBQVEsQ0FBQyxRQUFRLENBQUMsSUFBSSxDQUFDLFVBQVUsQ0FBQyxhQUFhLEVBQUUsUUFBTSxPQUFPLFNBQU0sWUFBYyxDQUFDLENBQUM7YUFDMUY7WUFDRCxJQUFJLE9BQU8sU0FBTSxhQUFhLElBQUksSUFBSSxFQUFFO2dCQUN0QyxJQUFJLENBQUMsUUFBUSxDQUFDLFdBQVcsQ0FBQyxJQUFJLENBQUMsVUFBVSxDQUFDLGFBQWEsRUFBRSxRQUFNLE9BQU8sU0FBTSxhQUFlLENBQUMsQ0FBQzthQUM5RjtTQUNGO0tBQ0Y7O2dCQTlCRixTQUFTLFNBQUM7b0JBQ1QsUUFBUSxFQUFFLFdBQVc7b0JBQ3JCLFFBQVEsRUFBRSxpRkFBK0U7aUJBQzFGOzs7O2dCQVRzRSxTQUFTO2dCQUE1RCxVQUFVOzs7dUJBVzNCLEtBQUs7NkJBRUwsS0FBSyxZQUNMLFdBQVcsU0FBQyxhQUFhOzs0QkFkNUI7O1NBVWEsaUJBQWlCIiwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IHsgQ29tcG9uZW50LCBFbGVtZW50UmVmLCBIb3N0QmluZGluZywgSW5wdXQsIE9uQ2hhbmdlcywgT25Jbml0LCBSZW5kZXJlcjIsIFNpbXBsZUNoYW5nZXMgfSBmcm9tICdAYW5ndWxhci9jb3JlJztcbmltcG9ydCB7IFNpemVQcm9wIH0gZnJvbSAnQGZvcnRhd2Vzb21lL2ZvbnRhd2Vzb21lLXN2Zy1jb3JlJztcblxuLyoqXG4gKiBGb250YXdlc29tZSBsYXllcnMuXG4gKi9cbkBDb21wb25lbnQoe1xuICBzZWxlY3RvcjogJ2ZhLWxheWVycycsXG4gIHRlbXBsYXRlOiBgPG5nLWNvbnRlbnQgc2VsZWN0PVwiZmEtaWNvbiwgZmEtbGF5ZXJzLXRleHQsIGZhLWxheWVycy1jb3VudGVyXCI+PC9uZy1jb250ZW50PmAsXG59KVxuZXhwb3J0IGNsYXNzIEZhTGF5ZXJzQ29tcG9uZW50IGltcGxlbWVudHMgT25Jbml0LCBPbkNoYW5nZXMge1xuICBASW5wdXQoKSBzaXplPzogU2l6ZVByb3A7XG5cbiAgQElucHV0KClcbiAgQEhvc3RCaW5kaW5nKCdjbGFzcy5mYS1mdycpXG4gIGZpeGVkV2lkdGg/OiBib29sZWFuO1xuXG4gIGNvbnN0cnVjdG9yKFxuICAgIHByaXZhdGUgcmVuZGVyZXI6IFJlbmRlcmVyMixcbiAgICBwcml2YXRlIGVsZW1lbnRSZWY6IEVsZW1lbnRSZWYsXG4gICkge1xuICB9XG5cbiAgbmdPbkluaXQoKSB7XG4gICAgdGhpcy5yZW5kZXJlci5hZGRDbGFzcyh0aGlzLmVsZW1lbnRSZWYubmF0aXZlRWxlbWVudCwgJ2ZhLWxheWVycycpO1xuICB9XG5cbiAgbmdPbkNoYW5nZXMoY2hhbmdlczogU2ltcGxlQ2hhbmdlcykge1xuICAgIGlmICgnc2l6ZScgaW4gY2hhbmdlcykge1xuICAgICAgaWYgKGNoYW5nZXMuc2l6ZS5jdXJyZW50VmFsdWUgIT0gbnVsbCkge1xuICAgICAgICB0aGlzLnJlbmRlcmVyLmFkZENsYXNzKHRoaXMuZWxlbWVudFJlZi5uYXRpdmVFbGVtZW50LCBgZmEtJHtjaGFuZ2VzLnNpemUuY3VycmVudFZhbHVlfWApO1xuICAgICAgfVxuICAgICAgaWYgKGNoYW5nZXMuc2l6ZS5wcmV2aW91c1ZhbHVlICE9IG51bGwpIHtcbiAgICAgICAgdGhpcy5yZW5kZXJlci5yZW1vdmVDbGFzcyh0aGlzLmVsZW1lbnRSZWYubmF0aXZlRWxlbWVudCwgYGZhLSR7Y2hhbmdlcy5zaXplLnByZXZpb3VzVmFsdWV9YCk7XG4gICAgICB9XG4gICAgfVxuICB9XG59XG4iXX0=