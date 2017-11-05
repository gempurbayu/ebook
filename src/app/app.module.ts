import { NgModule, ErrorHandler } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';

import { AboutPage } from '../pages/about/about';
import { ContactPage } from '../pages/contact/contact';
import { HomePage } from '../pages/home/home';
import { TabsPage } from '../pages/tabs/tabs';

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';




export const firebaseConfig = {
  apiKey            : 'AIzaSyABko4memE1Fdk18jKL0hIfR6jJTbi0DpA',
  authDomain        : 'https://console.firebase.google.com/project/jaguarteam',
  databaseURL       : 'https://jaguarteam-5ccc4.firebaseio.com/',
  storageBucket     : 'gs://jaguarteam-5ccc4.appspot.com',
  messagingSenderId : 'YOUR-MESSAGING-SENDER-ID-HERE'
};

@NgModule({
  declarations: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    TabsPage
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp)
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    TabsPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler}
  ]
})
export class AppModule {}
