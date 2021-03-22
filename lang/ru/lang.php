<?php return [
    'plugin'     => [
        'name'        => 'Toolbox',
        'description' => 'Toolbox — это набор хэлперов для ускорения разработки на платформе October CMS.',
    ],
    'field'      => [
        'id'                       => 'ID',
        'name'                     => 'Название',
        'title'                    => 'Заголовок',
        'active'                   => 'Активность',
        'hidden'                   => 'Скрытый',
        'code'                     => 'Код',
        'slug'                     => 'URL',
        'external_id'              => 'Внешний ID',
        'preview_text'             => 'Краткое описание',
        'preview_image'            => 'Изображение-превью',
        'image'                    => 'Изображение',
        'images'                   => 'Изображения (галерея)',
        'description'              => 'Описание',
        'category'                 => 'Категория',
        'category_parent_id'       => 'ID родительской категории',
        'category_parent'          => 'Родительская категория',
        'children_category'        => 'Дочерние категории',
        'email'                    => 'Email',
        'phone'                    => 'Контактный телефон',
        'moderation'               => 'Модерация',
        'mode'                     => 'Режим работы',
        'status'                   => 'Статус',
        'city'                     => 'Город',
        'address'                  => 'Адрес',
        'street'                   => 'Улица',
        'lat'                      => 'lat',
        'lng'                      => 'lng',
        'type'                     => 'Тип',
        'avatar'                   => 'Аватар',
        'property'                 => 'Свойство',
        'property_list_value'      => 'Допустимые значения свойства',
        'property_mode'            => 'Вид свойства',
        'property_tab'             => 'Название вкладки',
        'property_is_translatable' => 'Свойство доступно для перевода',
        'key'                      => 'Ключ',
        'value'                    => 'Значение',
        'label'                    => 'Метка',
        'date'                     => 'Дата',
        'datetime'                 => 'Дата и время',
        'time'                     => 'Время',
        'file'                     => 'Файл',
        'decimals'                 => 'Число знаков после запятой',
        'dec_point'                => 'Разделитель дробной части',
        'thousands_sep'            => 'Разделитель тысяч',
        'dot'                      => 'Точка',
        'comma'                    => 'Запятая',
        'together'                 => 'Слитно',
        'space'                    => 'Пробел',
        'date_begin'               => 'Дата начала действия',
        'date_end'                 => 'Дата окончания действия',
        'discount_value'           => 'Размер скидки',
        'discount_type'            => 'Тип скидки',
        'discount_price'           => 'Значение скидки',
        'discount'                 => 'Скидка',
        'product'                  => 'Товар',
        'priority'                 => 'Приоритет',
        'group'                    => 'Группа',
        'count'                    => 'Количество',
        'amount'                   => 'Сумма',
        'author'                   => 'Автор',
        'link'                     => 'Ссылка',
        'view_count'               => 'Количество просмотров',
        'is_default'               => 'По-умолчанию',
        'symbol'                   => 'Символ',
        'field'                    => 'Поле',
        'weight'                   => 'Вес',
        'height'                   => 'Высота',
        'length'                   => 'Длина',
        'width'                    => 'Ширина',

        'sort_order' => 'Сортировка',
        'created_at' => 'Создано',
        'updated_at' => 'Обновлено',
        'deleted_at' => 'Удалено',
        'deleted'    => 'Удаленные',
        'empty'      => 'Не выбрано',
        'password'   => 'Пароль',

        'site_settings'                 => 'Настройки приложения',
        'site_settings_description'     => 'Общие настройки приложения',
        'queue_on'                      => 'Отправка писем используя Queue',
        'queue_name'                    => 'Название queue для отправки письма',
        'import_queue_on'               => 'Использовать queue при обработке импорта',
        'import_queue_name'             => 'Название Queue при обработке импорта',
        'email_list_description'        => 'Заполните список email адресов, разделенных запятыми',
        'import_deactivate'             => 'Деактивировать элементы',
        'import_deactivate_description' => 'Все элементы, которых нет в CSV файле, будут деактивированы.',

        'country'  => 'Страна',
        'state'    => 'Регион',
        'house'    => 'Номер дома',
        'flat'     => 'Номер квартиры',
        'address1' => 'Адрес 1',
        'address2' => 'Адрес 2',
        'postcode' => 'Индекс',

        'import_file_list'             => 'Список файлов импорта',
        'import_from_file'             => 'Импорт из файла',
        'import_file_path'             => 'Относительный путь из папки "storage" к файлу импорта',
        'import_path_prefix'           => 'Префикс полей для этого файла',
        'import_file_namespace'        => 'Пространство имен файла',
        'import_image_folder'          => 'Относительный путь из папки "storage" к папке с изображениями',
        'import_path_to_list'          => 'Путь к узлу со списком элементов',
        'import_path_to_list_example'  => 'main/elements/element',
        'import_field_list'            => 'Список полей',
        'import_path_to_field'         => 'Путь к узлу поля',
        'import_path_to_field_example' => 'fields/field[@code="active"]',
    ],
    'tab'        => [
        'preview_content' => 'Превью-контент',
        'full_content'    => 'Полный контент',
        'images'          => 'Изображения',
        'files'           => 'Файлы',
        'settings'        => 'Настройки',
        'description'     => 'Описание',
        'properties'      => 'Свойства',
        'mail'            => 'Отправка писем',
        'import'          => 'Импорт',
        'permissions'     => 'Управление настройками приложения',
        'prices_format'   => 'Формат цен',
    ],
    'component'  => [
        'property_name_error_404' => 'Отображать 404 страницу',
        'property_slug'           => 'Slug',
        'property_slug_required'  => 'Параметр Slug обязательный',
        'property_url_check'      => 'Умная проверка URL',
        'pagination'              => 'Пагинация',
        'pagination_desc'         => 'Вывод кнопок пагинации',

        'property_redirect_page'         => 'Страница перенаправления',
        'property_redirect_success_page' => 'Страница перенаправления после успешного выполнения',
        'property_redirect_fail_page'    => 'Страница перенаправления после не успешного выполнения',
        'property_redirect_on'           => 'Перенаправление вкл.',
        'property_flash_on'              => 'Уведомление вкл.',
        'property_mode'                  => 'Режим работы',
        'mode_submit'                    => 'Отправка формы',
        'mode_ajax'                      => 'Ajax',
        'has_wildcard'                   => 'Часть URL является wildcard параметром',
        'skip_error'                     => 'Пропустить ошибку "Не найдено"',
    ],
    'message'    => [
        'create_success'                  => 'Создание :name было успешно выполнено',
        'update_success'                  => 'Редактирование :name было успешно выполнено',
        'delete_success'                  => 'Удаление :name было успешно выполнено',
        'restore_confirm'                 => 'Вы действительно хотите восстановить выбранные элементы?',
        'restore_success'                 => 'Элементы восстановлены',
        'e_not_correct_request'           => 'Некорректный запрос',
        'row_is_empty'                    => 'Пустая строка.',
        'external_id_is_empty'            => 'Пустое значение внешнего ID.',
        'import_additional_info'          => 'Дополнительная информация о импорте.',
        'import_active_field_info'        => 'Значение поля "Активность" будет уставлено в true, если его не передавать в файле CSV.',
        'import_preview_image_field_info' => 'Путь к файлу превью-изображения должен быть указан относительно директории хранилища в вашем проекте. Например: "app/media/image.jpg".',
        'import_images_field_info'        => 'Путь к файлам изображениЙ должен быть указан относительно директории хранилища в вашем проекте. Например: "app/media/image.jpg". Пути к файлам должны быть указаны через запятую.',
        'import_from_xml_confirm'         => 'Начать импорт из XML файла?',
        'import_from_xml_report'          => 'Результаты импорта: создано - :created, обновлено - :updated, пропущено - :skipped, обработано - :processed.',
    ],
    'settings'   => [
        'count_per_page'                => 'Количество элементов на странице',
        'available_count_per_page'      => 'Список допустимых значений для "count_per_page"',
        'available_count_per_page_desc' => 'Укажите список допустимых значений через запятую',
        'number_validation'             => 'Необходимо ввести число',
        'pagination_limit'              => 'Максимальное количество кнопок пагинации',
        'active_class'                  => 'Класс активной кнопки',
        'button_list'                   => 'Список кнопок',
        'button_list_description'       => 'main,first,first-more,prev,prev-more,next,next-more,last,last-more',
        'button_name'                   => 'Название кнопки',
        'button_limit'                  => 'Отображить после страницы',
        'button_number'                 => 'Отображить имя кнопки как число',
        'button_class'                  => 'CSS класс',
        'last_button'                   => '"Последняя"',
        'last-more_button'              => '"Еще" (перед "Последняя")',
        'next_button'                   => '"Следующая"',
        'next-more_button'              => '"Еще" (перед "Следующая")',
        'prev_button'                   => '"Предыдущая"',
        'prev-more_button'              => '"Еще" (после "Предыдущая")',
        'first_button'                  => '"Первая"',
        'first-more_button'             => '"Еще" (после "Первая")',
        'main_button'                   => '"Основная"',
        'slug_is_translatable'          => 'URL поддерживает мультиязычность',
    ],
    'button'     => [
        'add_property_value' => 'Добавить значение свойства',
        'import_from_csv'    => 'Импорт из CSV',
        'export_in_csv'      => 'Экспорт в CSV',
        'import_button'      => 'Импортировать записи',
        'import_from_xml'    => 'Импорт из XML',
    ],
    'type'       => [
        'input'            => 'Текстовое поле (input)',
        'number'           => 'Числовое поле (number)',
        'textarea'         => 'Текстовое поле (textarea)',
        'rich_editor'      => 'Текстовое поле (wysiwyg)',
        'single_checkbox'  => 'Чекбокс',
        'switch'           => 'Переключатель',
        'checkbox'         => 'Множественный выбор из списка (checkbox)',
        'balloon_selector' => 'Выбор из списка (balloon selector)',
        'tag_list'         => 'Множественный выбор из списка (tag list)',
        'select'           => 'Выбор из списка (select)',
        'radio'            => 'Выбор из списка (radio button)',
        'date'             => 'Поле выбора даты и времени (datetime)',
        'colorpicker'      => 'Поле выбора цвета (colorpicker)',
        'mediafinder'      => 'Файл',
    ],
    'permission' => [
        'settings' => 'Управление настройками',
    ],
];
