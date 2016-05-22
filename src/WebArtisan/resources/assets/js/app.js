$(document).on('pjax:start', function() { NProgress.start(); });
$(document).on('pjax:end',   function() { NProgress.done();  });
$(document).pjax('.elektra-sidebar a', '#elektra-container');


