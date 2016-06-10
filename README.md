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
iv) At this point, you will be given a public API key, a private API key (for your eyes only!), a js script and finally
a div element. Good to go!

Implementing the above

i) Firstly, you can easily add the div element in any document where you want a captcha to be embedded (as shown in my create.blade.php file
ii) Wherever this div goes, the script must follow! In this case, I have put the script in my master.blade.php file. the create.blade.php file extends this.
iii) When using the captcha, this submit event in create.blade.php sends the captcha request through the TicketsController.php file where it is picked up by the public function 'store'. You will notice method injection is used here so the input is validsated by a 'TicketFormRequest' class. There are many ways to vsalidate the input, this is one.
iv) If the user has successfully shown they are a human, the secret variable is assigned to my private API key. We then verify the response as shown in the store method and huzzah, in a handful of lines, you've implemented a nice little feature.
    
