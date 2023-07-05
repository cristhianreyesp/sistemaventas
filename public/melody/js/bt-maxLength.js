(function($) {
  'use strict';
  $('#defaultconfig').maxlength({
    warningClass: "badge mt-1 badge-success",
    limitReachedClass: "badge mt-1 badge-danger"
  });

  $('#dni').maxlength({
    alwaysShow: true,
    threshold: 8,
    warningClass: "badge mt-1 badge-success",
    limitReachedClass: "badge mt-1 badge-danger",
    validate: true
  });
  
  $('#phone').maxlength({
    alwaysShow: true,
    threshold: 9,
    warningClass: "badge mt-1 badge-success",
    limitReachedClass: "badge mt-1 badge-danger",
    validate: true
  });

  $('#ruc_number').maxlength({
    alwaysShow: true,
    threshold: 11,
    warningClass: "badge mt-1 badge-success",
    limitReachedClass: "badge mt-1 badge-danger",
    validate: true
  });
  $('#ruc').maxlength({
    alwaysShow: true,
    threshold: 11,
    warningClass: "badge mt-1 badge-success",
    limitReachedClass: "badge mt-1 badge-danger",
    validate: true
  });

  $('#defaultconfig-3').maxlength({
    alwaysShow: true,
    threshold: 10,
    warningClass: "badge mt-1 badge-success",
    limitReachedClass: "badge mt-1 badge-danger",
    separator: ' of ',
    preText: 'You have ',
    postText: ' chars remaining.',
    validate: true
  });

  $('#maxlength-textarea').maxlength({
    alwaysShow: true,
    warningClass: "badge mt-1 badge-success",
    limitReachedClass: "badge mt-1 badge-danger"
  });
})(jQuery);