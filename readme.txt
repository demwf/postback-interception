PHP-скрипт дл€ перехвата постбеков от √ус€ в CPA-трекер.

÷ель:
- ѕостроение отчетов с учетом продаж, ребилов и характерным показател€м

«адача скрипта:
- прин€ть постбек
- сохранить параметры в таблице
- передать параметры дальше в трекер

ѕараметры из ѕѕ:

{event_id} Ц уникальный идентификатор дл€ каждого событи€ в пп
{event} Ц наименование событи€:
	subs Ц подписка
	unsubs Ц отписка
	redeem Ц CPA
	iclick Ц продажа
	rebill Ц ребилл

{profit} Ц сумма выплаты партнеру в руб.

ƒополнительные плейсхолдеры дл€ передачи значений
{campaign_id} - id кампании
{landing_id} - id лендинга
{operator_id} - id оператора

ќпределить, как добавить дополнительные значение в трекер.

?n=custom&ak=c36e8e7b64&profit={profit}&txt_param20=USD&subid={p1}&
status={event}&event_id={event_id}&event={event}&campaign_id={campaign_id}&
landing_id={landing_id}&operator_id={operator_id}

»гнорировать
n=custom
ak=c36e8e7b64
txt_param20=USD

»менные пол€
profit={profit}
subid={p1}
status={event}
event_id={event_id}
event={event}
campaign_id={campaign_id}
landing_id={landing_id}
operator_id={operator_id}

