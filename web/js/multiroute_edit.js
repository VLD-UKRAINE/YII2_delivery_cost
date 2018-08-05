
ymaps.ready(init);

function init () {

    // Создадим панель маршрутизации.
    routePanelControl = new ymaps.control.RoutePanel({
        options: {
            // Добавим заголовок панели.
            showHeader: true,
            title: 'Простой маршрут'
        }
    }),

        routePanelControl.routePanel.options.set({
            types: {auto: true}
        });

    /**
     * Создание мультимаршрута.
     * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRoute.xml
     */
    var multiRoute = new ymaps.multiRouter.MultiRoute({
        referencePoints: []
    }, {
        // Тип промежуточных точек, которые могут быть добавлены при редактировании.
        editorMidPointsType: "via",
        // В режиме добавления новых путевых точек запрещаем ставить точки поверх объектов карты.
        editorDrawOver: false
    });

    var buttonEditor = new ymaps.control.Button({
        data: { content: "Составной маршрут", title: "Маршрут с остановками" },
        options: {
            // Зададим опции для кнопки.
            selectOnClick: false,
            // Кнопка будет иметь три состояния - иконка, текст и иконка+текст.
            // Поэтому зададим три значения ширины кнопки для всех состояний.
            maxWidth: [30, 100, 150]
        } });

    buttonEditor.events.add("select", function (e) {
        /**
         * Включение режима редактирования.
         */
        multiRoute.editor.start({
            addWayPoints: true,
            removeWayPoints: true
        });
    });

    buttonEditor.events.add("deselect", function (e) {
        // Выключение режима редактирования.
        multiRoute.editor.stop();
    });

    var buttonClear = new ymaps.control.Button({
        data: { content: "Очистить" }

    });
    buttonClear.events.add('click', function (e) {
        myMap.geoObjects.remove(multiRoute);
    });




    // Создаем карту с добавленной на нее кнопкой.
    var myMap = new ymaps.Map('map', {
        center: [59.922091, 30.368350],
        zoom: 9,
        controls: [buttonEditor, buttonClear]
    }, {
        buttonMaxWidth: 300
    });

    myMap.controls.add(routePanelControl);


    // Добавляем мультимаршрут на карту.
    myMap.geoObjects.add(multiRoute);




}

