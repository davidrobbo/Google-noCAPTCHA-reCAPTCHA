# Google-noCAPTCHA-reCAPTCHA

This repo will take you through the basic steps needed to implement a google noCAPTCHA reCAPTCHA on your website.

First of all, a little background info. The standard captchas used throughout the web where the user has to offer their response
to a distorted image is outdated. They're often quite difficult to read for most users, let alone for thsoe with some form of
impairment which makes this task more difficult. Final note on this, some data suggests that AI is able to crack these codes
in 99.8% of attempts!

The noCAPTCHA reCAPTCHA doesn't require user input (in most cases) and simply requires the click of a checkbox to confirm 
'you are not a robot'. It works a lot of magic in the backgroud checking the browser behaviour (key events, mouse events etc.)
to distinguish as to whether you are a robot or a human. It also has the ability to add an extra layer of validation by
making the user click on images based on a criteria in the event they feel the probability of the user not being human is not above
a certain freshold.

STEPS:

i) got to https://www.google.com/recaptcha/intro/index.html and click 'GET reCAPTCHA'
ii) Sign in with a google accout.
iii) Add your label and domains (e.g. myNewWebsite and mynewwebsite.app/.dev...)
iv) At this point, you will be given a public API key, a private API key (for your eyes only!), a js <script> and finally
    a <div> element. We're good to go!
    
