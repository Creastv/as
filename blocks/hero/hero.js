if (jQuery(window).width() > 500) {
    jQuery('.go-parallex').paroller({
        factor: -0.3, // multiplier for scrolling speed and offset, +- values for direction control  
        // factorLg: 0.4, // multiplier for scrolling speed and offset if window width is less than 1200px, +- values for direction control  
        type: 'foreground', // background, foreground  
        direction: 'vertical', // vertical, horizontal  
        transition: 'translate 0.1s ease' // CSS transition, added on elements where type:'foreground' 
    });
    jQuery('.go-parallex-kids').paroller({
        factor:-0.2, // multiplier for scrolling speed and offset, +- values for direction control  
        // factorLg: 0.4, // multiplier for scrolling speed and offset if window width is less than 1200px, +- values for direction control  
        type: 'foreground', // background, foreground  
        direction: 'vertical', // vertical, horizontal  
        transition: 'translate 0.1s ease' // CSS transition, added on elements where type:'foreground' 
    });
  }