function setTranslateCookie(lang) {
    var date = new Date();
    date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000)); // expires in 30 days
    document.cookie = 'googtrans=/' + lang + ';expires=' + date.toUTCString() + ';path=/';
  }
  
  function updatePageLanguage() {
    var lang = getCookie('googtrans');
    if (lang) {
      var elements = document.getElementsByTagName('html');
      elements[0].setAttribute('lang', lang.substring(0, 2));
      elements[0].setAttribute('xml:lang', lang.substring(0, 2));
    }
  }
  
  function getCookie(name) {
    var value = '; ' + document.cookie;
    var parts = value.split('; ' + name + '=');
    if (parts.length == 2)
      return parts
        .pop()
        .split(';')
        .shift();
  }
  
  // Call the functions on page load
  window.onload = function() {
    updatePageLanguage();
  };
  
  // Call the functions when the language is changed
  document.getElementsByTagName('select')[0].addEventListener('change', function() {
    setTranslateCookie(this.value);
    updatePageLanguage();
  });