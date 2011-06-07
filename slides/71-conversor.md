#Conversores

    $app->get('/Slide/{slide}', function (Slide $slide) {
        return $slide->mostrar();
    })
    ->convert('slide', function ($slug) { return new Slide($slug); });

O bien...

    $cargadorSlides = function ($slides) {
        return new Slide($slug);
        };
    //...

    ->convert('slide', $cargadorSlides);

