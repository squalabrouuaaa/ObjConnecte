import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DashboardCompoComponent } from './dashboard-compo.component';

describe('DashboardCompoComponent', () => {
  let component: DashboardCompoComponent;
  let fixture: ComponentFixture<DashboardCompoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DashboardCompoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DashboardCompoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
