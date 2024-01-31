/*========Calender Js=========*/
/*==========================*/

document.addEventListener("DOMContentLoaded", function () {
    /*=================*/
    //  Calender Date variable
    /*=================*/
    var newDate = new Date();

    function getDynamicMonth() {
        getMonthValue = newDate.getMonth();
        _getUpdatedMonthValue = getMonthValue + 1;
        if (_getUpdatedMonthValue < 10) {
            return `0${_getUpdatedMonthValue}`;
        } else {
            return `${_getUpdatedMonthValue}`;
        }
    }
    /*=================*/
    // Calender Modal Elements
    /*=================*/
    var getModalTitleEl = document.querySelector("#event-title");
    var getModalStartDateEl = document.querySelector("#event-start-date");
    var getModalEndDateEl = document.querySelector("#event-end-date");
    var calendarsEvents = {
        Danger: "danger",
        Success: "success",
        Primary: "primary",
        Warning: "warning",
    };
    /*=====================*/
    // Calendar Elements and options
    /*=====================*/
    var calendarEl = document.querySelector("#calendar");
    var checkWidowWidth = function () {
        if (window.innerWidth <= 1199) {
            return true;
        } else {
            return false;
        }
    };
    var calendarHeaderToolbar = {
        left: "prev next",
        center: "title",
        right: "dayGridMonth,timeGridWeek",
    };
    var calendarEventsList = [{
            id: 1,
            title: "Event Conf.",
            start: `${newDate.getFullYear()}-${getDynamicMonth()}-01`,
            extendedProps: {
                calendar: "Danger"
            },
        },
        {
            id: 2,
            title: "Seminar #4",
            start: `${newDate.getFullYear()}-${getDynamicMonth()}-07`,
            end: `${newDate.getFullYear()}-${getDynamicMonth()}-10`,
            extendedProps: {
                calendar: "Success"
            },
        },
    ];
    /*=====================*/
    // Calendar Select fn.
    /*=====================*/
    var calendarSelect = function (info) {
        getModalAddBtnEl.style.display = "block";
        getModalUpdateBtnEl.style.display = "none";
        myModal.show();
        getModalStartDateEl.value = info.startStr;
        getModalEndDateEl.value = info.endStr;
    };

    /*=====================*/
    // Calender Event Function
    /*=====================*/
    var calendarEventClick = function (info) {
        var eventObj = info.event;

        if (eventObj.url) {
            window.open(eventObj.url);

            info.jsEvent.preventDefault();
        } else {
            var getModalEventId = eventObj._def.publicId;
            var getModalEventLevel = eventObj._def.extendedProps["calendar"];
            var getModalCheckedRadioBtnEl = document.querySelector(
                `input[value="${getModalEventLevel}"]`
            );

            getModalTitleEl.value = eventObj.title;
            getModalCheckedRadioBtnEl.checked = true;
            getModalUpdateBtnEl.setAttribute(
                "data-fc-event-public-id",
                getModalEventId
            );
            getModalAddBtnEl.style.display = "none";
            getModalUpdateBtnEl.style.display = "block";
            myModal.show();
        }
    };

    /*=====================*/
    // Active Calender
    /*=====================*/
    var calendar = new FullCalendar.Calendar(calendarEl, {
        selectable: true,
        height: checkWidowWidth() ? 900 : 1052,
        initialView: checkWidowWidth() ? "listWeek" : "dayGridMonth",
        initialDate: `${newDate.getFullYear()}-${getDynamicMonth()}-07`,
        headerToolbar: calendarHeaderToolbar,
        events: calendarEventsList,
        select: calendarSelect,
        unselect: function () {
            console.log("unselected");
        },
        eventClassNames: function ({
            event: calendarEvent
        }) {
            const getColorValue =
                calendarsEvents[calendarEvent._def.extendedProps.calendar];
            return [
                "event-fc-color fc-bg-" + getColorValue,
            ];
        },

        eventClick: calendarEventClick,
        windowResize: function (arg) {
            if (checkWidowWidth()) {
                calendar.changeView("listWeek");
                calendar.setOption("height", 900);
            } else {
                calendar.changeView("dayGridMonth");
                calendar.setOption("height", 1052);
            }
        },
    });
    /*=====================*/
    // Calendar Init
    /*=====================*/
    calendar.render();
    var myModal = new bootstrap.Modal(document.getElementById("eventModal"));
    var modalToggle = document.querySelector(".fc-addEventButton-button ");
    document
        .getElementById("eventModal")
        .addEventListener("hidden.bs.modal", function (event) {
            getModalTitleEl.value = "";
            getModalStartDateEl.value = "";
            getModalEndDateEl.value = "";
            var getModalIfCheckedRadioBtnEl = document.querySelector(
                'input[name="event-level"]:checked'
            );
            if (getModalIfCheckedRadioBtnEl !== null) {
                getModalIfCheckedRadioBtnEl.checked = false;
            }
        });
});
