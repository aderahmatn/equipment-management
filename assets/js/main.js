/*
 Project Name: UltraForm
 Project URI: http://wp.alithemes.com/html/ultraform/demos
 Description: UltraForm - Bootstrap 5 Multi-Purpose Form Templates
 Author: alithemes.com
 Author URI: http://alithemes.com
 Version: 1.0
 License: GNU General Public License v2 or later
 License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
(function($) {
    'use strict';

    // Page loading
    $(window).on('load', function() {
        $('.preloader').delay(450).fadeOut('slow');
    });

    //datepicker
    var datePicker = function() {
        try {
            $('.js-datepicker').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "autoUpdateInput": false,
                locale: {
                    format: 'DD/MM/YYYY'
                },
            });
        
            var myCalendar = $('.js-datepicker');
            var isClick = 0;
        
            $(window).on('click',function(){
                isClick = 0;
            });
        
            $(myCalendar).on('apply.daterangepicker',function(ev, picker){
                isClick = 0;
                $(this).val(picker.startDate.format('DD/MM/YYYY'));
        
            });
        
            $('.js-btn-calendar').on('click',function(e){
                e.stopPropagation();
        
                if(isClick === 1) isClick = 0;
                else if(isClick === 0) isClick = 1;
        
                if (isClick === 1) {
                    myCalendar.focus();
                }
            });
        
            $(myCalendar).on('click',function(e){
                e.stopPropagation();
                isClick = 1;
            });
        
            $('.daterangepicker').on('click',function(e){
                e.stopPropagation();
            });
        
        
        } catch(er) {console.log(er);}
    }

    //customSelect
    var customSelect = function(){
        try {
            var selectSimple = $('.js-select-simple');
        
            selectSimple.each(function () {
                var that = $(this);
                var selectBox = that.find('select');
                var selectDropdown = that.find('.select-dropdown');
                selectBox.select2({
                    dropdownParent: selectDropdown
                });
            });
        
        } catch (err) {
            console.log(err);
        }        
    }
    
    //Load functions
    $(document).ready(function() {
        datePicker();
        customSelect();
    });

})(jQuery);