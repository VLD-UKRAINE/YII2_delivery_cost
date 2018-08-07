ymaps.ready(init);

function init() {

    // Стоимость за километр.
    var DELIVERY_TARIFF = 20,
        // Минимальная стоимость.
        MINIMUM_COST = 500,
        piterTownPolygon,
        piter15Poligon,
        piterOblPolygon;


        // Создадим панель маршрутизации.
        routePanelControl = new ymaps.control.RoutePanel({
            options: {
                // Добавим заголовок панели.
                showHeader: true,
                title: 'Простой маршрут'
            }
        }),

        zoomControl = new ymaps.control.ZoomControl({
            options: {
                size: 'small',
                float: 'none',
                position: {
                    bottom: 145,
                    right: 10
                }
            }
        });
    // Пользователь сможет построить только автомобильный маршрут.
    routePanelControl.routePanel.options.set({
        types: {auto: true}
    });

    // Если вы хотите задать неизменяемую точку "откуда", раскомментируйте код ниже.
    // routePanelControl.routePanel.state.set({
    //     fromEnabled: false,
    //     from: 'Красное село, проспект Ленина 1'
    //  });


    // Получим ссылку на маршрут.
    routePanelControl.routePanel.getRouteAsync().then(function (route) {

        // Зададим максимально допустимое число маршрутов, возвращаемых мультимаршрутизатором.
        route.model.setParams({results: 2}, true);

        // Повесим обработчик на событие построения маршрута.
        route.model.events.add('requestsuccess', function () {

            var activeRoute = route.getActiveRoute();
            if (activeRoute) {
                // Получим протяженность маршрута.
                var length = route.getActiveRoute().properties.get("distance"),
                    // Вычислим стоимость доставки.
                    price = calculate(Math.round(length.value / 1000)),
                    // Создадим макет содержимого балуна маршрута.
                    balloonContentLayout = ymaps.templateLayoutFactory.createClass(
                        '<span>Расстояние: ' + length.text + '.</span><br/>' +
                        '<span style="font-weight: bold; font-style: italic">Стоимость доставки: ' + price + ' р.</span><br/>'+
                        '<span style="font-weight: bold; font-style: italic">Позвоните нам: 1234567890</span><br/>'+
                        '<span style="font-weight: bold; font-style: italic">ТОВ "Паровоз"</span>');
                // Зададим этот макет для содержимого балуна.
                route.options.set('routeBalloonContentLayout', balloonContentLayout);
                // Откроем балун.
                activeRoute.balloon.open();
            }
        });

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
            selectOnClick: true,
            // Кнопка будет иметь три состояния - иконка, текст и иконка+текст.
            // Поэтому зададим три значения ширины кнопки для всех состояний.
            maxWidth: [30, 100, 150]
        } });

    buttonEditor.events.add("select", function (e) {
        /**
         * Включение режима редактирования.
         * В качестве опций может быть передан объект с полями:
         * addWayPoints - разрешает добавление новых путевых точек при клике на карту. Значение по умолчанию: false.
         * dragWayPoints - разрешает перетаскивание уже существующих путевых точек. Значение по умолчанию: true.
         * removeWayPoints - разрешает удаление путевых точек при двойном клике по ним. Значение по умолчанию: false.
         * dragViaPoints - разрешает перетаскивание уже существующих транзитных точек. Значение по умолчанию: true.
         * removeViaPoints - разрешает удаление транзитных точек при двойном клике по ним. Значение по умолчанию: true.
         * addMidPoints - разрешает добавление промежуточных транзитных или путевых точек посредством перетаскивания маркера, появляющегося при наведении курсора мыши на активный маршрут. Тип добавляемых точек задается опцией midPointsType. Значение по умолчанию: true
         * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRoute.xml#editor
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

    myMap = new ymaps.Map('map', {
        center: [59.922091, 30.368350],
        zoom: 9,
        controls: [buttonEditor]
    });
        myMap.controls.add(routePanelControl).add(zoomControl);

    //...............................Добавляем полигоны на карту ........
    function TownPolygonLoad (json) {

        piterTownPolygon = new ymaps.Polygon(json.coordinates);
        console.log(json.coordinates);
        // Если мы не хотим, чтобы контур был виден, зададим соответствующую опцию.
        piterTownPolygon.options.set('visible', true);
        piterTownPolygon.options.set('fillColor', "#D0FF00");
        piterTownPolygon.options.set('draggable', false);
        piterTownPolygon.options.set('fillOpacity', 0.1);

        // Чтобы корректно осуществлялись геометрические операции
        // над спроецированным многоугольником, его нужно добавить на карту.
        myMap.geoObjects.add(piterTownPolygon);
    }

    function Z15PolygonLoad (json) {

        piter15Poligon = new ymaps.Polygon(json.coordinates);
        console.log(json.coordinates);
        // Если мы не хотим, чтобы контур был виден, зададим соответствующую опцию.
        piter15Poligon.options.set('visible', true);
        piter15Poligon.options.set('fillColor', "#7388FF");
        piter15Poligon.options.set('draggable', false);
        piter15Poligon.options.set('fillOpacity', 0.3);

        // Чтобы корректно осуществлялись геометрические операции
        // над спроецированным многоугольником, его нужно добавить на карту.
        myMap.geoObjects.add(piter15Poligon);
    }
    function OblPolygonLoad (json) {

        piterOblPolygon = new ymaps.Polygon(json.coordinates);
        console.log(json.coordinates);
        // Если мы не хотим, чтобы контур был виден, зададим соответствующую опцию.
        piterOblPolygon.options.set('visible', false);
        piterOblPolygon.options.set('fillColor', "#49FF46");
        piterOblPolygon.options.set('draggable', false);
        piterOblPolygon.options.set('fillOpacity', 0.2);

        // Чтобы корректно осуществлялись геометрические операции
        // над спроецированным многоугольником, его нужно добавить на карту.
        myMap.geoObjects.add(piterOblPolygon);
    }

    //...............................КОНЕЦ ПОЛИГОНОВ ........

    // Добавляем мультимаршрут  на карту.
    myMap.geoObjects.add(multiRoute);

    // Повесим обработчик на событие построения маршрута.
    multiRoute.model.events.add('requestsuccess', function () {

        var activeRoute = multiRoute.getActiveRoute();
        if (activeRoute) {
            // Получим протяженность маршрута.
            var length = multiRoute.getActiveRoute().properties.get("distance"),
                // Вычислим стоимость доставки.
                price = calculate(Math.round(length.value / 1000)),
                // Создадим макет содержимого балуна маршрута.
                balloonContentLayout = ymaps.templateLayoutFactory.createClass(
                    '<span>Расстояние: ' + length.text + '.</span><br/>' +
                    '<span style="font-weight: bold; font-style: italic">Стоимость доставки: ' + price + ' р.</span><br/>'+
                    '<span style="font-weight: bold; font-style: italic">По городу 00км</span><br/>'+
                    '<span style="font-weight: bold; font-style: italic">В 15 км зоне 00км</span><br/>'+
                    '<span style="font-weight: bold; font-style: italic">По области 00км</span><br/>'+
                    '<span style="font-weight: bold; font-style: italic">Позвоните нам: 1234567890</span><br/>'+
                    '<span style="font-weight: bold; font-style: italic">ТОВ "Паровоз"</span>');
            // Зададим этот макет для содержимого балуна.
            multiRoute.options.set('routeBalloonContentLayout', balloonContentLayout);
            // Откроем балун.
            activeRoute.balloon.open();
        }
    });

    // Функция, вычисляющая стоимость доставки.
    function calculate(routeLength) {
        return Math.max(routeLength * DELIVERY_TARIFF, MINIMUM_COST);
    }


    $.ajax({
        url: 'piter-town',
        dataType: 'json',
        success: TownPolygonLoad
    });
    $.ajax({
        url: 'piter-15',
        dataType: 'json',
        success: Z15PolygonLoad
    });
    $.ajax({
        url: 'piter-obl',
        dataType: 'json',
        success: OblPolygonLoad
    });
}