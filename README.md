<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## [REFERÊNCIA MASTER](https://www.youtube.com/watch?v=ImtZ5yENzgE&ab_channel=freeCodeCamp.org)

Referências que usei para resolver problemas:

- [Problema criando novo laravel](https://stackoverflow.com/questions/65183425/problem-creating-a-new-project-with-laravel).
- [make:auth problem](https://stackoverflow.com/questions/34545641/php-artisan-makeauth-command-is-not-defined).
- [Bootstrap not renderering 1](https://www.techiediaries.com/laravel/how-to-install-bootstrap-in-laravel-6-7-by-example/) 
- [Bootstrap not renderering 2](https://laracasts.com/discuss/channels/code-review/empty-appcss-and-appscss-files) 
- [GD problem]( Intervention Image GD library extension).
- [Pagination render](https://stackoverflow.com/questions/48284599/laravel-pagination-links-not-working?rq=1).

## Responsive image problem

Solução encontrada: 
Diminuí o tamanho da imagem de w-100 para w-75, 
conforme nomes disponíveis aqui: https://bootstrapshuffle.com/classes/sizing/w-100

setei os tamanhos mínimos da seguinte forma, style="    min-width: 100px;     flex-shrink: 0; min-height: 30%"
conforme encontrei escrito aqui:
https://stackoverflow.com/questions/14142378/how-can-i-fill-a-div-with-an-image-while-keeping-it-proportional

E tirei o padding lateral (estava usando as laterais para padding ao invés de para uso da imagem, então eu mudei a config)
Esse eu vi em algum lugar, p-5 é padding em todos sentidos, py-5 é padding apenas no eixo vertical, px-5 é só no horizontal, pt-5 é top, pr-5 é direita, pb-5 é bottom, etc... vai de 1 a 5
https://getbootstrap.com/docs/4.0/utilities/spacing/


### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
