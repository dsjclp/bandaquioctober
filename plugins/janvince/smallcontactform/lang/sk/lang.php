<?php
return [
  'plugin' => [
    'name' => 'Kontaktný formulár',
    'description' => 'Jednoduchý kontaktný formulár',
    'category' => 'Small plugins',
  ],
  'permissions' => [
    'access_messages' => 'Prístup k zoznamu správ',
    'access_settings' => 'Prístup k nastaveniam',
    'delete_messages' => 'Zmazať vybrané správy',
    'export_messages' => 'Exportovať správy',
  ],
  'navigation' => [
    'main_label' => 'Kontaktný formulár',
    'messages' => 'Správy',
  ],
  'controller' => [
    'contact_form' => [
      'name' => 'Kontaktný formulár',
      'description' => 'Pridá na stránku kontaktný formulár',
      'no_fields' => 'Pridajte prosím nejaké formulárové polia v administrácií systému (Nastavenia > Kontaktný formulár > Polia)...',
    ],
    'filter' => [
      'date' => 'Rozmedzie dátumu',
    ],
    'scoreboard' => [
      'records_count' => 'Správy',
      'latest_record' => 'najnovšie od',
      'new_count' => 'Nové',
      'new_description' => 'Správ',
      'read_count' => 'Prečítané',
      'all_count' => 'Celkom',
      'all_description' => 'Správ',
      'settings_btn' => 'Nastavenie formulára',
      'mark_read' => 'Označiť ako prečítané',
      'mark_read_confirm' => 'Naozaj chcete vybrané správy označiť ako prečítané?',
      'mark_read_success' => 'Správy boli označené ako prečítané.',
    ],
    'preview' => [
      'record_not_found' => 'Správa nebola nájdená!',
    ],
  ],
  'models' => [
    'message' => [
      'columns' => [
        'id' => 'ID',
        'datetime' => 'Dátum a čas',
        'form_data' => 'Dáta formulára',
        'name' => 'Meno',
        'email' => 'Email',
        'message' => 'Správa',
        'new_message' => 'Stav',
        'new' => 'Nová',
        'read' => 'Prečítaná',
        'remote_ip' => 'IP odosielateľa',
        'created_at' => 'Dátum vytvorenia',
        'updated_at' => 'Dátum aktualizácie',
      ]
    ],
  ],
  'controllers' => [
    'messages' => [
      'list_title' => 'Správy',
      'preview' => 'Náhľad',
      'preview_title' => 'Správa z kontaktného formulára',
      'preview_date' => 'Z dňa:',
      'preview_content_title' => 'Obsah:',
      'remote_ip' => 'odoslané z ip',
      'form_alias' => 'Alias',
      'form_description' => 'Popis',   
      'export' => 'Export', 
    ],
    'index' => [
      'unauthorized' => 'Neoprávnený prístup!',
    ],
  ],
  'mail' => [
    'templates' => [
      'autoreply' => 'Správa automatickej odpovede z kontaktného formulára (Anglicky)',
      'notification' => 'Notifikácia z kontaktného formulára (Anglicky)',
      'autoreply_cs' => 'Správa automatickej odpovede z kontaktného formulára (Česky)',
      'notification_cs' => 'Notifikácia z kontaktného formulára (Česky)',
    ]
  ],
  'reportwidget' => [
    'partials' => [
      'messages' => [
        'label' => 'Kontaktný formulár - Prehľad správ',
        'title' => 'Prehľad správ',
        'messages_all' => 'Všetky',
        'messages_new' => 'Nové',
        'messages_read' => 'Prečítané',
      ],
      'new_message' => [
        'label' => 'Kontaktný formulár - Nové správy',
        'title' => 'Nové správy',
        'link_text' => 'Kliknite pre zobrazenie prehľadu správ',
      ],
    ],
  ],
  'settings' => [
    'form' => [
      'css_class' => 'CSS trieda formulára',
      'use_placeholders' => 'Používať zástupný text (placeholder)',
      'use_placeholders_comment' => 'Miesto popiskov nad formulárovými poliami bude použitý zástupný text',
      'disable_browser_validation' => 'Zakázať validáciu prehliadačom',
      'disable_browser_validation_comment' => 'Nepovoliť prehliadaču použiť vlastnú validáciu a zobrazovať výstrahy.',
      'success_msg' => 'Správa po úspešnom odoslaní',
      'success_msg_placeholder' => 'Formulár bol v poriadku odoslaný.',
      'error_msg' => 'Chybová správa',
      'error_msg_placeholder' => 'Pri odosielaní formulára došlo k chybe!',
      'allow_ajax' => 'Povoliť AJAX',
      'allow_ajax_comment' => 'Povolí AJAX, ale umožní fungovanie formulára aj na prehliadačoch s vypnutým JavaScriptom',
      'allow_confirm_msg' => 'Požadovať potvrdenie pred odoslaním',
      'allow_confirm_msg_comment' => 'Zobrazí potvrdzovacie okno pred odoslaním formulára',
      'send_confirm_msg' => 'Text potvrdenia',
      'send_confirm_msg_placeholder' => 'Naozaj chcete odoslať formulár?',
      'hide_after_success' => 'Skryť formulár po úspešnom odoslaní',
      'hide_after_success_comment' => 'Po odoslaní zobrazí iba správu s potvrdením bez formulára',
      'add_assets' => 'Pridať doplnky',
      'add_assets_comment' => 'Automaticky vloží potrebné CSS štýly a JS skripty (Viac informácií je v súbore README.md)',
      'add_css_assets' => 'Pridať CSS štýly',
      'add_css_assets_comment' => 'Vloží všetky potrebné štýly',
      'add_js_assets' => 'Pridať JS skripty',
      'add_js_assets_comment' => 'Vloží všetky potrebné skripty',
    ],
    'buttons' => [
      'send_btn_text' => 'Text odosielacieho tlačidla',
      'send_btn_text_placeholder' => 'Odoslať',
      'send_btn_css_class' => 'CSS trieda odosielacieho tlačidla',
      'send_btn_css_class_placeholder' => 'btn btn-primary',
      'send_btn_wrapper_css' => 'CSS trieda kontajneru',
      'send_btn_wrapper_css_placeholder' => 'form-group',
    ],
    'redirect' => [
      'allow_redirect' => 'Presmerovať po úspěšnom odoslaní',
      'allow_redirect_comment' => 'Presmerovať na inú stránku po úspešnom odoslaní formulára',
      'redirect_url' => 'URL stránky pre presmerovanie',
      'redirect_url_comment' => 'Vložte URL adresu stránky, kam bude presmerované (např. /kontakt/dakujeme)',
      'redirect_url_placeholder' => '/kontakt/dakujeme',
      'redirect_url_external' => 'Externá URL',
      'redirect_url_external_comment' => 'Toto je adresa externej stránky (napr. http://www.domain.com)',
    ],
    'form_fields' => [
      'prempt' => 'Pridať nové pole formulára',
      'name' => 'NÁZOV POĽA',
      'name_comment' => 'Malými písmenami bez diakritiky (napr. meno, email, vasa_poznamka, ...)',
      'type' => 'Typ poľa',
      'label' => 'Popisok (label)',
      'label_placeholder' => 'Pole formulára',
      'field_styling' => 'Vlastné CSS triedy',
      'field_styling_comment' => 'Môžete pridať vlastné štýly',
      'autofocus' => 'Automaticky zvýrazniť (autofocus)',
      'autofocus_comment' => 'Po zobrazení nastaviť na pole kurzor',
      'wrapper_css' => 'CSS trieda kontajneru',
      'wrapper_css_placeholder' => 'form-group',
      'field_css' => 'CSS trieda poľa',
      'field_css_placeholder' => 'form-control',
      'label_css' => 'CSS trieda popisku (label)',
      'label_css_placeholder' => '',
      'field_validation' => 'Validačné pravidlá poľa',
      'field_validation_comment' => 'Povolí nastavenie vlastných validačných pravidiel',
      'validation' => 'Pravidlo',
      'validation_prempt' => 'Pridať pravidlo',
      'validation_type' => 'Typ',
      'validation_error' => 'Chybová správa',
      'validation_error_placeholder' => 'prosím vložte správne dáta.',
      'validation_error_comment' => 'Chybová hláška, ktorá sa zobrazí pri poli',
      'custom' => 'vlastné pole',
      'custom_description' => 'vlastné pole s validačnými pravidlami',
    ],
    'form_field_types' => [
      'text' => 'Text',
      'email' => 'Email',
      'textarea' => 'Textarea',
      'checkbox' => 'Checkbox',
      'dropdown' => 'Dropdown',
      'file' => 'File',
      'custom_code' => 'Custom code',
      'custom_content' => 'Custom content',
    ],
    'form_field_validation' => [
      'select' => '--- Vyberte pravidlo ---',
      'required' => 'Vyžadované',
      'email' => 'Email',
      'numeric' => 'Číslo',
    ],
    'email' => [
      'address_from' => 'Adresa OD',
      'address_from_placeholder' => 'john.doe@domain.com',
      'address_from_name' => 'Meno odesielateľa',
      'address_from_name_placeholder' => 'John Doe',
      'subject' => 'Peedmet emailu',
      'subject_comment' => 'Nastavte iba pokiaľ chcete prepísať predmet definovaný v šablóne (Nastavenia > E-mailové šablóny).',
      'template' => 'Šablóna emailu',
      'template_comment' => 'Kód emailovej šablóny vytvorenej v Nastavenia > E-mailové šablóny. Nechajte prázdne pre predvolenú šablónu: janvince.smallcontactform::mail.autoreply.',
      'allow_email_queue' => 'Řadit do fronty',
      'allow_email_queue_comment' => 'Pridať emaily do fronty místo okamžitého odoslaní. Musíte ale nejdříve správně nakonfigurovat frontu systému OctoberCMS!',
      'allow_notifications' => 'Povoliť odosielanie upozornění',
      'allow_notifications_comment' => 'Odesílat upozornení, pokiaľ niekto odošle formulár.',
      'notification_address_to' => 'Upozornenia posielať na adresu:',
      'notification_address_to_comment' => 'Jedna emailová adresa alebo zoznam adries oddelených čiarkami',
      'notification_address_to_placeholder' => 'notifications@domain.com',
      'notification_address_from_form' => 'nastaviť adresu Od na email z formulára (NEMUSÍ PODPOROVAŤ váš emailový systém!)',
      'notification_address_from_form_comment' => 'Nastaví u odosielaného upozornenia adresu Od (From) na tú, ktorá bola zadaná vo formulári (stĺpec email musí mať nastavenú väzbu).',
      'allow_autoreply' => 'Povoliť automatickú odpoveď',
      'allow_autoreply_comment' => 'Poslať automatickú odpoveď odosielateľovi formulára',
      'autoreply_name_field' => 'Pole formulára, ktoré obsahuje MENO odosielateľa',
      'autoreply_name_field_empty_option' => '-- Vyberte --',
      'autoreply_name_field_comment' => 'Pole typu Text.',
      'autoreply_email_field' => 'Pole formulára, ktoré obsahuje EMAIL odosielateľa',
      'autoreply_email_field_empty_option' => '-- Vyberte --',
      'autoreply_email_field_comment' => 'Pole typu Email.',
      'autoreply_message_field' => 'Pole formulára, ktoré obsahuje SPRÁVU',
      'autoreply_message_field_empty_option' => '-- vyberte --',
      'autoreply_message_field_comment' => 'Pole typu Textarea alebo Text.',
      'notification_template' => 'Šablóna notifikačného emailu',
      'notification_template_comment' => 'Kód emailovej šablóny vytvorenej v Nastavenia > E-mailové šablóny. Nechajte prázdne pre predvolenú šablónu: janvince.smallcontactform::mail.notification.',
    ],
    'antispam' => [
      'add_antispam' => 'Pridať pasívnu ochranu proti spamu',
      'add_antispam_comment' => 'Pridá jednoduchú ale efektívnu pasívnu ochranu proti robotom (viac informácií v súbore README.md)',
      'antispam_delay' => 'Meškanie formulára (s)',
      'antispam_delay_comment' => 'Test na príliš rýchle odoslanie formulára (väčšinou robotmi)',
      'antispam_delay_placeholder' => '3',
      'antispam_label' => 'Popisok (label) antispamového poľa',
      'antispam_label_comment' => 'Popisok bude viditeľný iba na prehliadačoch bez podpory JavaScriptu',
      'antispam_label_placeholder' => 'prosím vymažte toto pole',
      'antispam_error_msg' => 'Chybová správa',
      'antispam_error_msg_comment' => 'Správa, ktorá se zobrazí, pokiaľ sa aktivuje pasívny antispam',
      'antispam_error_msg_placeholder' => 'prosím vymažte obsah tohoto poľa!',
      'antispam_delay_error_msg' => 'Chybová správa pri rýchlom odoslaní',
      'antispam_delay_error_msg_comment' => 'Správa, ktorá se zobrazí pri príliš rýchlom odoslaní formulára',
      'antispam_delay_error_msg_placeholder' => 'Príliš rýchle odoslanie formulára! prosím skúste to za pár sékúnd znovu!',
      'add_google_recaptcha' => 'Pridať Google reCaptcha',
      'add_google_recaptcha_comment' => 'Pridá reCaptcha do kontaktného formulára (viac informácií v súbore README.md). <br>API kľúče môžete získať na <a href="https://www.google.com/recaptcha/admin#list" target="_blank">stránke Google reCaptcha</a>.',
      'google_recaptcha_site_key' => 'Site key',
      'google_recaptcha_site_key_comment' => 'Vložte svoj "site key"',
      'google_recaptcha_secret_key' => 'Secret key',
      'google_recaptcha_secret_key_comment' => 'Vložte svoj "secret key"',
      'google_recaptcha_error_msg' => 'Chybová správa',
      'google_recaptcha_error_msg_comment' => 'Správa, ktorá sa zobrazí, pokiaľ dôjde k chybe pri overení reCAPTCHA.',
      'google_recaptcha_error_msg_placeholder' => 'Chyba pri overení pomocou Google reCAPTCHA!',
      'google_recaptcha_scripts_allow' => 'Automaticky pridať Google reCAPTCHA skript',
      'google_recaptcha_scripts_allow_comment' => 'Vloží odkaz na JavaScriptový súbor potrebný pre fungovanie reCAPTCHA.',
      'google_recaptcha_locale_allow' => 'Povoliť detekciu jazyka',
      'google_recaptcha_locale_allow_comment' => 'Pridá k reCAPTCHA skriptu kód jazyka stránky, takže overovací box bude preložený do jazyka návštevníka webu.',
      'add_ip_pretection' => 'Testovať IP adresu odosielateľa',
      'add_ip_pretection_comment' => 'Nepovolí príliš mnoho odoslaní formulára z jednej IP adresy',
      'add_ip_pretection_count' => 'Maximálny počet odoslaní behom jedného dňa',
      'add_ip_pretection_count_comment' => 'Počet povolených odoslaní formulára z jednej IP adresy behom jedného dňa',
      'add_ip_pretection_count_placeholder' => '3',
      'add_ip_pretection_error_get_ip' => 'Nepodarilo sa určiť vašu IP adresu!',
      'add_ip_pretection_error_too_many_submits' => 'Chybová správa pri prekročení počtu odoslaní',
      'add_ip_pretection_error_too_many_submits_comment' => 'Správa, ktorú obdrží uživateľ pri prekročení limitu počtu odoslaní formulára',
      'add_ip_pretection_error_too_many_submits_placeholder' => 'Bol prekročný limit odoslaní formulára behom jedného dňa!',
      'disabled_extensions' => 'Zakázané rozšírenia',
      'disabled_extensions_comment' => 'Nastavenia zo záložky Súkromie spôsibili vypnutie týchto rozšírení',
    ],
    'mapping' => [
      'hint' => [
        'title' => 'zrušiť vazby na stĺpce?',
        'content' => '
        <p>Môžete vytvoriť ľubovolný formulár s vlastnými poliami a ich typmi.</p>
        <p>Systém zapíše do databázy všetky odoslané dáta formulára, ale pre Prehľad správ sú zvlášť ukladané polia Meno, Email a Správa.</p>
        <p>preto je nutné identifikovať pre tieot stĺpce odpovedajúce polia vo vašom formulári.</p>
        <p><em>Vytvorené väzby sú použité aj pri odosielaní automatických odpovedí, kde je nutná väzba aspoň na pole Email.</em></p>
        ',
      ],
      'warning' => [
        'title' => 'Nevidíte vaše formulárové polia?',
        'content' => '
        <p>Pokiaľ tu nevidíte svoje formulárové polia, kliknite dole na tlačidlo Uložiť a potom obnovte stránku (F5 alebo Ctrl+R / Cmd+R).</p>
        ',
      ],
    ],
    
    'privacy' => [
      'disable_messages_saving' => 'Zakázať ukladanie správ',
      'disable_messages_saving_comment' => 'Pokiaľ je zaškrtnuté, odoslané správy sa nebudú ukladať do databázy.<br><strong>Táto voľba zárovaň zakáže použitie IP ochrany!</strong>',
      'disable_messages_saving_comment_section' => '<div class="callout fade in callout-danger no-subheader"><div class="header"><i class="icon-warning"></i><h3>Uistite sa, že máte povolené notifikačné emaily, inak nebudete mať žiadne dáta z odoslaných formulárov!</h3></div></div>',
    ],
    'tabs' => [
      'form' => 'Formulár',
      'buttons' => 'Odosielacie tlačidlo',
      'form_fields' => 'Pole formulára',
      'mapping' => 'Väzby stĺpcov',
      'email' => 'Email',
      'antispam' => 'Antispam',
      'privacy' => 'Súkromie'      
    ],
  ],
  'components' => [
      'groups' => [
          'hacks' => 'Hacks',
      ],
      'preperties' => [
          'disable_notifications' => 'Zakázať odosielanie notifikačných emailov',
          'disable_notifications_comment' => 'Zakáže odoslanie notifikačných emailov (bez ohľadu na systémové nastavenia formulára)',
          'form_description' => 'Popisok formulára',
          'form_description_comment' => 'Volitelne môžete pridať popisok formulára, ktorý sa uloží spoločne s odoslanými dátami zoznamu správ. Môžete použiť aj {{ :slug }}.',
      ]
  ],
];
