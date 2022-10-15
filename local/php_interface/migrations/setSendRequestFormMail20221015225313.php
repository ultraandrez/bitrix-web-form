<?php

namespace Sprint\Migration;


class setSendRequestFormMail20221015225313 extends Version
{
    protected $description = "Установка агента рассылки почты с заявками";

    protected $moduleVersion = "4.0.0";

    public function up()
    {
		\CAgent::AddAgent(
			'\Local\Classes\RequestForm::setSendRequestMailsAgent();',// имя функции
			'',// идентификатор модуля
			'N',// критичность к кол-ву запусков
			'1800',// интервал запуска
			ConvertTimeStamp(false, 'FULL'),// дата первой проверки на запуск
			'Y',// активность
			ConvertTimeStamp(false, 'FULL'),// дата первого запуска
			'100'// сортировка
		);
		
    }

    public function down()
    {
		\CAgent::RemoveAgent('\Local\Classes\RequestForm::setSendRequestMailsAgent();');
    }
}
