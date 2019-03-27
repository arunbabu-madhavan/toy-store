$(document).ready(function(){
  var bootstrap_enabled = (typeof $().modal == 'function');
  console.log(bootstrap_enabled);
  var bootstrap_enabled = (typeof $().emulateTransitionEnd == 'function');
  console.log(bootstrap_enabled);
});