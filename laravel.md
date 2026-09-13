en windows:
powershell como admin:

Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.5'))



Success!
 php, composer, and laravel have been installed successfully.


esto es si tienes php y composer y aun no laravel:
 desde cualquier terminal:
 composer global require laravel/installer













https://medium.com/@jessnolimitt/laravel-12-authentication-vs-workos-3d1fa1fdf13d

Cost Considerations: Laravel’s Free Model vs. WorkOS Pricing

    Laravel 12 Built-in Authentication: Completely free, with no per-user or per-connection charges. However, developing custom SSO or SCIM sync can take weeks of dev time.
    WorkOS: Offers a free tier with up to 1 million monthly active users (MAU), but SSO for production environments starts at $125 per connection per month. If your clients require dedicated SSO connections, costs can scale quickly.

For B2B SaaS applications, the WorkOS pricing is often justified-clients are willing to pay for enterprise authentication. But for B2C or internal tools, Laravel’s built-in authentication remains the best choice.


choose:
- built in auth
- no auth features 
- skills amd copilot (didnt want them)


How to Skip Laravel BoostIf you do not want Laravel Boost included when creating a new application, run 

laravel new my-app --no-boost

You can start your local development using:                  
1. cd example                                                
2. composer run dev     

Changed to blade option, the startter kit uses mostly react.....