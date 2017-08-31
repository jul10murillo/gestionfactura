<?php

echo Collapse::widget([
        'items' => [
            [
                'label' => 'Ver más',
                'content' => $this->render('view') ,
            ],
        ]
    ]);
