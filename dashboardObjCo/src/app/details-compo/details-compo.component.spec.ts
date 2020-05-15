import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DetailsCompoComponent } from './details-compo.component';

describe('DetailsCompoComponent', () => {
  let component: DetailsCompoComponent;
  let fixture: ComponentFixture<DetailsCompoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DetailsCompoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DetailsCompoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
