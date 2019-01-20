import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ChatCamouflageComponent } from './chat-camouflage.component';

describe('ChatCamouflageComponent', () => {
  let component: ChatCamouflageComponent;
  let fixture: ComponentFixture<ChatCamouflageComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ChatCamouflageComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ChatCamouflageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
