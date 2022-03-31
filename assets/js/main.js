(function ($) {
    "use strict";


    $(".selectBox").on("click", function (e) {
        $(this).toggleClass("show");
        var dropdownItem = e.target;
        var container = $(this).find(".selectBox__value");
        container.text(dropdownItem.text);
        $(dropdownItem)
            .addClass("active")
            .siblings()
            .removeClass("active");
    });

    /*****************************
     * Commons Variables
     *****************************/
    var $window = $(window),
        $body = $('body');

    /****************************
     * Sticky Menu
     *****************************/
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $(".sticky-header").removeClass("sticky");
        } else {
            $(".sticky-header").addClass("sticky");
        }
    });

    /**************************
     * Offcanvas: Menu Content
     **************************/
    function mobileOffCanvasMenu() {
        var $offCanvasNav = $('.offcanvas-menu'),
            $offCanvasNavSubMenu = $offCanvasNav.find('.mobile-sub-menu');

        /*Add Toggle Button With Off Canvas Sub Menu*/
        $offCanvasNavSubMenu.parent().prepend('<div class="offcanvas-menu-expand"></div>');

        /*Category Sub Menu Toggle*/
        $offCanvasNav.on('click', 'li a, .offcanvas-menu-expand', function (e) {
            var $this = $(this);
            if ($this.attr('href') === '#' || $this.hasClass('offcanvas-menu-expand')) {
                e.preventDefault();
                if ($this.siblings('ul:visible').length) {
                    $this.parent('li').removeClass('active');
                    $this.siblings('ul').slideUp();
                    $this.parent('li').find('li').removeClass('active');
                    $this.parent('li').find('ul:visible').slideUp();
                } else {
                    $this.parent('li').addClass('active');
                    $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
                    $this.closest('li').siblings('li').find('ul:visible').slideUp();
                    $this.siblings('ul').slideDown();
                }
            }
        });
    }

    mobileOffCanvasMenu();


    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        navText: ["<div class='fas fa-chevron-left nav-btn prev-slide'></div>", "<div class='fas fa-chevron-right nav-btn next-slide'></div>"],
        center: true,


        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })


    /************************************************
     * Scroll Top
     ***********************************************/
    $('body').materialScrollTop();

    function Revenue_check() {
        // First let's set the colors of our sliders
        const settings = {
            fill: '#2D81B9',
            background: '#D5E6F1'
        }

        // First find all our sliders
        const sliders = document.querySelectorAll('.range-slider');

        // Iterate through that list of sliders
        // ... this call goes through our array of sliders [slider1,slider2,slider3] and inserts them one-by-one into the code block below with the variable name (slider). We can then access each of wthem by calling slider
        Array.prototype.forEach.call(sliders, (slider) => {
            // Look inside our slider for our input add an event listener
            //   ... the input inside addEventListener() is looking for the input action, we could change it to something like change
            slider.querySelector('input').addEventListener('input', (event) => {
                // 1. apply our value to the span
                document.getElementById('growth-range').value = event.target.value;

                slider.querySelector('span').innerHTML = event.target.value;


                // 2. apply our fill to the input
                applyFill(event.target);
            });
            // Don't wait for the listener, apply it now!
            applyFill(slider.querySelector('input'));
        });

        // This function applies the fill to our sliders by using a linear gradient background
        function applyFill(slider) {
            // Let's turn our value into a percentage to figure out how far it is in between the min and max of our input
            const percentage = 100 * (slider.value - slider.min) / (slider.max - slider.min);
            // now we'll create a linear gradient that separates at the above point
            // Our background color will change here
            const bg = `linear-gradient(90deg, ${settings.fill} ${percentage}%, ${settings.background} ${percentage + 0.1}%)`;
            slider.style.background = bg;
        }
    }

    Revenue_check();


// corl calculator script

    var lastday = function (m) {
        var date = new Date();
        return new Date(date.getFullYear(), m + 1, 0).toLocaleDateString('en-us', {year: "2-digit", month: "short"});
    }


    var monthly_revenue = 50000;
    var growth_rate_main = 25;
    var option = {
        style: 'percent'

    };
    var formatter = new Intl.NumberFormat("en-US", option);
    var growth_rate = formatter.format(growth_rate_main / 100);

    var company_valuation = 5000000;

    var financing_amount = 100000;


    function company_value(s) {

        var revenue_value = monthly_revenue * ((1 + growth_rate / 12) ^ s) * 12 * company_valuation / (monthly_revenue * 12);


        return revenue_value;


    }


    function intToString(num) {
        num = num.toString().replace(/[^0-9.]/g, '');
        if (num < 1000) {
            return num;
        }
        let si = [
            {v: 1E3, s: "K"},
            {v: 1E6, s: "M"},
            {v: 1E9, s: "B"},
            {v: 1E12, s: "T"},
            {v: 1E15, s: "P"},
            {v: 1E18, s: "E"}
        ];
        let index;
        for (index = si.length - 1; index > 0; index--) {
            if (num >= si[index].v) {
                break;
            }
        }
        return (num / si[index].v).toFixed(2).replace(/\.0+$|(\.[0-9]*[1-9])0+$/, "$1") + si[index].s;
    }


    const labels = [lastday(0), lastday(1), lastday(2), lastday(3), lastday(4), lastday(5), lastday(6), lastday(7), lastday(8), lastday(9), lastday(10), lastday(11), lastday(12), lastday(13), lastday(14), lastday(15), lastday(16), lastday(17), lastday(18), lastday(19), lastday(20), lastday(21), lastday(22), lastday(23), lastday(24)];

    const data = {
        labels: labels,
        datasets: [/* {
            label: 'Company Valuation',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [],
            showLine: true,
            spanGaps: true,
          } ,*/
            {
                label: 'Cost of Equity',
                backgroundColor: '#FF54C2',
                borderColor: '#FF54C2',
                radius: 0,
                data: [0, 2083, 4210, 6381, 8597, 10860, 13169, 15527, 17934, 20391, 22899, 25459, 28073, 30741, 33465, 36246, 39084, 41982, 44940, 47959, 51042, 54188, 57401, 60680, 64027],
                showLine: true,
                spanGaps: true,
                tension: 1,

            },
            {
                label: 'Cost of Corl',
                backgroundColor: '#4F68EA',
                borderColor: '#4F68EA',
                radius: 0,
                data: [0, 1171, 2357, 3556, 4769, 5996, 7238, 8494, 9765, 11051, 12352, 13668, 15000, 16347, 17710, 19089, 20484, 21896, 23324, 24768, 26230, 27709, 29205, 30719, 32250],
                showLine: true,
                spanGaps: true,
                tension: 1,
            },
            {
                label: 'Savings',
                backgroundColor: '#579AC7',
                borderColor: '#579AC7',
                radius: 0,
                data: [0, 912, 1853, 2825, 3828, 4864, 5931, 7033, 8169, 9340, 10547, 11791, 13073, 14394, 15755, 17156, 18600, 20086, 21616, 23191, 24812, 26479, 28196, 29961, 31777],
                showLine: true,
                spanGaps: true,
                tension: 1,
            },
        ]
    };

    const config = {
        type: 'line',
        data: data,
        options: {

            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            layout: {
                padding: 0,
            },
            legend: {
                labels: {
                    radius: 50,
                    align: 'start',
                },
                align: 'start',
                radius: 50,
            },

            stacked: true,
            scales: {
                x: {
                    display: true,
                    grid: {
                        drawOnChartArea: false, // only want the grid lines for one axis to show up

                    },
                    height: 59,

                },
                y: {
                    display: true,
                    grid: {
                        drawOnChartArea: true, // only want the grid lines for one axis to show up

                    },
                    height: 59,
                    ticks: {
                        // Include a dollar sign in the ticks
                        callback: function (value, index, values) {
                            return '$' + intToString(value);
                        }
                    }
                },

            },

            plugins: {

                tooltip: {
                    enabled: true,
                    position: 'nearest',
                    backgroundColor: 'rgba(255, 255, 255, 1)',
                    titleColor: '#A4B2B9',
                    bodyColor: 'rgba(0, 0, 0, 1)',
                    padding: 10,
                    bodySpacing: 10,
                    radius: 20,
                    titleFont: {
                        weight: 'normal',
                    },


                }

            }


        },


    };
    if (document.getElementById('myChart')) {
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        var checkbutton,
            element = document.getElementById("checkbutton");
        if (element != null) {
            checkbutton = element;
        } else {
            checkbutton = 2;
        }


        checkbutton.addEventListener('click', function (e) {


            var monthly_revenue = document.getElementById("monthly-revenue").value;


            var growth_rate_main = document.getElementById("growth-range").value;
            var growth_rate = growth_rate_main / 100;


            var company_valuation = document.getElementById("company-valuation").value;
            var financing_amount = document.getElementById("financing-amount").value;

            function company_value_final(f) {

                var revenue_value = monthly_revenue * ((1 + growth_rate / 12) ** f) * 12 * company_valuation / (monthly_revenue * 12);
                return revenue_value;

            }

            function CostOfEquityValue(c) {

                var EquityValue = company_value_final(c) * financing_amount / company_valuation - financing_amount;


                return EquityValue;

            }


            function CostofCorlValue(g) {

                var CostOfCorl = financing_amount * (1 + 0.15) ** (g / 12) - financing_amount;

                return CostOfCorl;
            }


            function CorlSavingsValue(s) {

                var CorlSavings = CostOfEquityValue(s) - CostofCorlValue(s);

                return CorlSavings;
            }


            myChart.clear();

            myChart.reset();


            myChart.data.datasets[0].data = [];
            myChart.data.datasets[1].data = [];
            myChart.data.datasets[2].data = [];
            //myChart.data.datasets[3].data = [];
            for (let l = 0; l < 25; l++) {

                //myChart.data.datasets[0].data.push(company_value_final(l));


                myChart.data.datasets[0].data.push(Math.round(CostOfEquityValue(l)));

                myChart.data.datasets[1].data.push(Math.round(CostofCorlValue(l)));

                myChart.data.datasets[2].data.push(Math.round(CorlSavingsValue(l)));

                //console.log(`${l} = ${myChart.data.datasets[3].data.concat(CorlSavingsValue(l))}`);

            }

            myChart.update();


            var changesavings = document.getElementById("savingsnumber").innerHTML = myChart.data.datasets[2].data[24].toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });


        });
    }
// end corl calcutar


})(jQuery);