jQuery(".flip-box-inner").flip({
  trigger: 'hover'
});

jQuery("ul.nav-menu > li").hover(function () {
  setTimeout(function () {
    jQuery('ul.nav-menu > li:hover > .sub-menu').css('opacity', 1);
  }, 200);
}, function () {
  jQuery('ul.nav-menu > li > .sub-menu').css('opacity', 0);
});

setTimeout(function () {
  jQuery('.main-navigation').css('display', 'block');
}, 200);

var headersearchtoggle = document.getElementById('headersearchtoggle')
headersearchtoggle.addEventListener('click', function () {

  document.querySelector('.gbhem-header-search').classList.toggle('active')
})


/* Selectable Quick Search

  Requires a jsonencoded variable(selectSearchData) as a data source on the page prior to execution.
  Example:
  var selectSearchData ={
    "GroupName": [
      "Selected Text"
    ]
  }
  Required elements:
  <select name="" id="selectgroup"></select> //hold grouping of links
  <select name="" id="selectkeywords"></select>//actual links and text
  <button name="" id="selectsearchgo">Go</button> //trigger for changing pages"searching"
*/
/* Selectable Quick Search */
function SelectSearch() {
  //var selectGroup = document.querySelectorAll('.selectgroup');
  var selectGroup = [].slice.call(document.querySelectorAll(".selectgroup"));//get all instances of the select search on page.
  if (selectGroup != undefined && selectGroup != null) {
    selectGroup.forEach(function (group) {
      var go = group.nextElementSibling.nextElementSibling;
      addGroups(group); //add main groups to selector
      addKeywords(group); //prepopulate the keywords for
      group.addEventListener('change', function () { //swap values on change
        addKeywords(group);
      })
      go.addEventListener('click', function () {
        var selecttype = go.previousElementSibling.previousElementSibling.value;
        var selectterm = go.previousElementSibling.value;
        window.location.href = window.location.origin + "?selectsearch=" + selectterm + "&selecttype=" + selecttype
      });
    });
    function addGroups(el) { // add groups tot the dropdown
      for (var prop in selectSearchData) { //loop top level(student pastor)
        var opt = document.createElement('option');
        opt.value = prop;
        opt.text = prop;
        el.add(opt, null);
      }
    }
    function addKeywords(group) { //add keywords to the dropdown
      var keywords = group.nextElementSibling; //keyword input
      keywords.innerHTML = ''; //clear out old values
      var data = selectSearchData[group.value];//get new values from main array
      data.forEach(function (linkterm) { //loop array populating the keyword dropdown
        var opt = document.createElement('option');
        opt.value = linkterm;
        opt.text = linkterm
        keywords.add(opt, null);
      })
    }
  }
}



// ACCORDION  -
var Accordion = function Accordion() {
  console.log('accordion should be loading')
  var headings = document.querySelectorAll('.schema-faq-question, .Accordion dt');// Get all the headings
  Array.prototype.forEach.call(headings, function (heading) {
    // Give each <h2> a toggle button child with the SVG plus/minus icon
    heading.innerHTML = "\n        <button aria-expanded=\"false\" class=\"accordionBtn\">\n          <svg aria-hidden=\"true\" focusable=\"false\" viewBox=\"0 0 11 11\" fill=\"#EA0B2A\">\n          <rect y=\"5.2\"  width=\"11\" height=\"1\"/>\n          <rect x=\"5.2\" class=\"vert\" width=\"1\" height=\"11\"/>\n          </svg>\n          ".concat(heading.textContent, "\n        </button>\n      "); // Function to create a node list of the content between this <h2> and the next
    var getContent = function getContent(elem) {
      var elems = [];
      while (elem.nextElementSibling && elem.nextElementSibling.tagName !== 'DT') {
        elems.push(elem.nextElementSibling);
        elem = elem.nextElementSibling;
      } // Delete the old versions of the content nodes
      elems.forEach(function (node) { node.parentNode.removeChild(node); });
      return elems;
    }; // Assign the contents to be expanded/collapsed (array)
    var contents = getContent(heading); // Create a wrapper element for `contents` and hide it
    var wrapper = document.createElement('div');
    wrapper.hidden = true; // Add each element of `contents` to `wrapper`
    contents.forEach(function (node) { wrapper.appendChild(node); }); // Add the wrapped content back into the DOM after the heading
    heading.parentNode.insertBefore(wrapper, heading.nextElementSibling);
    var btn = heading.querySelector('button'); // Assign the button
    btn.onclick = function () {
      // Cast the state as a boolean
      var expanded = btn.getAttribute('aria-expanded') === 'true' || false;
      btn.setAttribute('aria-expanded', !expanded); // Switch the state
      wrapper.hidden = expanded; // Switch the content's visibility
    };
  });
};

if (document.querySelector('.wp-block-yoast-faq-block, .Accordion') != undefined) {
  Accordion();
  document.querySelector('.accordionBtn').click();
}
document.addEventListener('DOMContentLoaded', function () {
  SelectSearch();
});






/*
day = 86400
week = 604800
month = 2592000
*/
var helppopup = document.getElementById('helppopup');

if (helppopup != null) {
  jQuery('#helppopup').click(function () {
    jQuery(this).toggleClass('closed');
    jQuery('#helpwindow').toggleClass('active');

    if (jQuery(this).hasClass('closed')) {
      jQuery('.needhelp').addClass('closed');
      jQuery('.needhelp').removeClass('active');
    }
    else {
      if (docCookies.getItem('needhelp') != "closed") {
        jQuery('.needhelp').addClass('active');
        jQuery('.needhelp').removeClass('closed');
      }
    }

    if (docCookies.getItem('popup') != "closed") {
      docCookies.setItem('popup', "closed", frequency);
    }
  });
}

jQuery('.bubble.option1').click(function () {
  jQuery('.chatline').hide();
  jQuery('.searchbox').show();
  jQuery('.bubbleback').show();
});

jQuery('.bubble.option2').click(function () {
  //jQuery('.chatline').hide();
  //jQuery('.contactform').show();
  window.location.href = '/e-resources/submit-your-question/';
});

jQuery('.windowtitle .closebutton').click(function () {
  jQuery('#helpwindow').removeClass('active');
  jQuery('#helpwindow').addClass('closed');
  jQuery('#helppopup').removeClass('closed');
  jQuery('#helppopup').addClass('active');
});

jQuery('.bubbleback').click(function (e) {
  e.preventDefault();
  jQuery('.chatline').show();
  jQuery('.searchbox').hide();
  jQuery('.bubbleback').hide();
});

if (docCookies.getItem('needhelp') != "closed" && typeof opendelay !== 'undefined' && !jQuery('#helpwindow').hasClass('active')) {
  setTimeout(function () {
    jQuery('.needhelp').addClass('active');
  }, opendelay);
}

jQuery('.needhelp .closebutton').click(function () {
  jQuery('.needhelp').addClass('closed');
  docCookies.setItem('needhelp', "closed", frequency);
});

jQuery('#search-nofiles').click(function () {
  window.location.href = '/?s=' + jQuery(this).val();
});
if (jQuery('.covervid-video').length) {
  jQuery('.covervid-video').coverVid(1920, 1080);
}



// Select all links with hashes
jQuery('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function (event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        jQuery('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function () {
          // Callback after animation
          // Must change focus!
          var $target = jQuery(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });

