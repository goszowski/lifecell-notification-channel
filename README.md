# Lifecell Notification Channel

## Потрібно додати в конфіг services блок:
```
'lifecell' => [
    'endpoint' => env('LIFECELL_ENDPOINT', 'https://api.omnicell.com.ua/ip2sms/'),
    'username' => env('LIFECELL_USERNAME'),
    'password' => env('LIFECELL_PASSWORD'),
],
```

## В модель User додати:
```
public function routeNotificationForLifecell()
{
    return $this->phone;
}
```
## Приклад Notification:
```
public function via($notifiable)
{
    return ['lifecell'];
}

public function toLifecell($notifiable)
{
    return (new LifecellMessage('Have a nice day!'));
}
```
