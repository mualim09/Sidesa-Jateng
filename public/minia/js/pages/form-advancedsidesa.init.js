
// Chocies Select plugin
document.addEventListener('DOMContentLoaded', function () {
  var genericExamples = document.querySelectorAll('[data-trigger]');
  for (i = 0; i < genericExamples.length; ++i) {
    var element = genericExamples[i];
    new Choices(element, {
      placeholderValue: 'This is a placeholder set in the config',
      searchPlaceholderValue: 'Cari nama daerah',
    });
  }

  var singleNoSearch = new Choices('#role', {
    searchEnabled: false,
    removeItemButton: false,

  });

  var singleNoSearch = new Choices('#is_active', {
    searchEnabled: false,
    removeItemButton: false,

  });
});