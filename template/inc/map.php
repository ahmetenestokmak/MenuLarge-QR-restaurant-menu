
    <!-- HERO MAP
    =================================================================================================================-->
    <section id="ts-hero" class="mb-0 flex-wrap" style="margin-top: -145px;">

        <!-- MAP
        =============================================================================================================-->
        <div class="ts-map w-100 ts-min-h__60vh ts-z-index__1">

            <div id="ts-map-hero" class="h-100"
                 data-ts-map-leaflet-provider="https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png"
                 data-ts-map-leaflet-attribution="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> | <a href='<?=s_url?>'>Webtech Bilişim</a> "
                 data-ts-map-zoom="10"
                 data-ts-map-controls="1"
                 data-ts-map-center-latitude="41.0049806"
                 data-ts-map-center-longitude="28.7313125"
                 data-ts-locale="tr-TR"
                 data-ts-currency="TRL"
                 data-ts-unit="m<sup>2</sup>"
                 data-ts-display-additional-info="area_Area;bedrooms_Bedrooms;bathrooms_Bathrooms;rooms_Rooms"
            >
            </div>

        </div>

        <!--SEARCH FORM
            =========================================================================================================-->
        <section id="search-form" class="ts-form__map-horizontal ts-z-index__2">
            <div class="container">

                <form id="form-search" class="ts-form">

                    <section class="ts-box p-0">
                        <!--PRIMARY SEARCH INPUTS
                            =========================================================================================-->
                        <div class="form-row px-4 py-3">

                            <!--Keyword-->
                            <div class="col-sm-12 col-md-4">
                                
                            </div>

                            <!--Other inputs-->
                            <div class="col-md-12">
                                <div class="form-row">

                                    <!--Type-->
                                    <div class="col-sm-2">
                                        <select class="custom-select my-2" id="type" name="type">
                                            <option value="">İl</option>
                                           
                                        </select>
                                    </div>
                                    
                                    <!--Type-->
                                    <div class="col-sm-2">
                                        <select class="custom-select my-2" id="type" name="type">
                                            <option value="">İlçe</option>
                                            
                                        </select>
                                    </div>
                                    
                                    <!--Type-->
                                    <div class="col-sm-2">
                                        <select class="custom-select my-2" id="type" name="type">
                                            <option value="">Tip</option>
                                            <option value="1">Toplantı Odası</option>
                                            <option value="2">Co-Working</option>
                                        </select>
                                    </div>

                                    <!--Max Price-->
                                    <div class="col-sm-2">
                                        <div class="input-group my-2">
                                            <input type="text" class="form-control border-right-0" id="price" placeholder="Maks Fiyat">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-white border-left-0">TL</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Submit button-->
                                    <div class="col-sm-4">
                                        <div class="form-group my-2">
                                            <button type="submit" class="btn btn-info w-100" id="search-btn">Ara
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!--end row-->
                            </div>
                            <!--end col-md-8-->

                        </div>
                        <!--end form-row-->

                        <!--MORE OPTIONS - ADVANCED SEARCH
                            =========================================================================================-->
                        <div class="ts-bg-light px-4 py-2 border-top">

                            <!--More Options Button-->
                            <a href="#more-options-collapse" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="more-options-collapse">
                                <i class="fa fa-plus-circle ts-text-color-primary mr-2 ts-visible-on-collapsed"></i>
                                <i class="fa fa-minus-circle ts-text-color-primary mr-2 ts-visible-on-uncollapsed"></i>
                                Daha Fazla Filtrele
                            </a>

                            <!--Hidden Form-->
                            <div class="collapse" id="more-options-collapse">

                                <!--Padding-->
                                <div class="py-4">

                                    <!--Row-->
                                    <div class="form-row">

                                        <!--Bedrooms
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="bedrooms">Bedrooms</label>
                                                <input type="number" class="form-control" id="bedrooms" name="bedrooms" min="0">
                                            </div>
                                        </div>-->

                                        <!--Bathrooms
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="bathrooms">Bathrooms</label>
                                                <input type="number" class="form-control" id="bathrooms" name="bathrooms" min="0">
                                            </div>
                                        </div>-->

                                        <!--Garages
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="garages">Garages</label>
                                                <input type="number" class="form-control" id="garages" name="garages" min="0">
                                            </div>
                                        </div>-->

                                    </div>
                                    <!--end row-->

                                    <!--Checkboxes-->
                                    <div id="features-checkboxes" class="w-100">
                                        <h6 class="mb-3">Sunulan Çözümler</h6>

                                        <div class="ts-column-count-3">

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_1" name="features[]" value="ch_1">
                                                <label class="custom-control-label" for="ch_1">TV</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_2" name="features[]" value="ch_2">
                                                <label class="custom-control-label" for="ch_2">Sunum Kumandası</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_3" name="features[]" value="ch_3">
                                                <label class="custom-control-label" for="ch_3">Projeksiyon</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_4" name="features[]" value="ch_4">
                                                <label class="custom-control-label" for="ch_4">İnternet</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_5" name="features[]" value="ch_5">
                                                <label class="custom-control-label" for="ch_5">Telefon Hizmeti</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_6" name="features[]" value="ch_6">
                                                <label class="custom-control-label" for="ch_6">Görüntülü Görüşme Sistemi</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_7" name="features[]" value="ch_7">
                                                <label class="custom-control-label" for="ch_7">Catering</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_8" name="features[]" value="ch_8">
                                                <label class="custom-control-label" for="ch_8">Teknik Destek</label>
                                            </div>

                                        </div>
                                        <!--end ts-column-count-3-->

                                    </div>
                                    <!--end #features-checkboxes-->

                                </div>
                                <!--end Padding-->
                            </div>
                            <!--end more-options-collapse-->

                        </div>
                        <!--end ts-bg-light-->
                    </section>

                </form>
                <!--end #form-search-->

            </div>
            <!--end container-->
        </section>
        <!--end #search-form-->

    </section>
    <!--end ts-hero-->