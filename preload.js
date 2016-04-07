/*
 * Function that disables the "preload" class
 * Prevents any CSS from running before the page is
 * finsihed loading.
 */
$(window).load(function()
{
    $("body").removeClass("preload");
});
