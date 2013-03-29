How to Use FOSBundle for Symfony2

1.Install by composer.phar add to composer.json
	"require": {
		///
        "friendsofsymfony/user-bundle": "2.0.*@dev"
    },

2.Run install by
 $ php composer.phar update

3.Add to kernel
	public function registerBundles()
    {
        $bundles = array(
			///
            new FOS\UserBundle\FOSUserBundle(),
        );

4.Crete User entity to store in DB 
	// src/Haii/IgisBundle/Entity/User.php

5.Open security.yml and add below (app/config/secutiry.yml)

	jms_security_extra:
    secure_all_services: false
    expressions: true

	security:
		encoders:
		    "FOS\UserBundle\Model\UserInterface": sha512

		role_hierarchy:
		    ROLE_ADMIN:       ROLE_USER
		    ROLE_SUPER_ADMIN: [ROLE_USER, ROLE_ADMIN, ROLE_ALLOWED_TO_SWITCH]

		providers:
		        fos_userbundle:
		            id: fos_user.user_manager

		firewalls:
		    main:
		        pattern:    ^/
		        form_login:
		            check_path: /login_check
		            login_path: /login
		            provider: fos_userbundle
		        logout:
		            path:   /logout
		            target: /
		        anonymous: ~
		        #http_basic:
		        #    realm: "Secured Demo Area"

		access_control:
		    - { path: ^/admin, roles: ROLE_SUPER_ADMIN }

6.Edit config.yml (app/config/config.yml) and add below to the end of file
	fos_user:
		db_driver: orm # other valid values are 'mongodb', 'couchdb' and 'propel'
		firewall_name: main
		user_class: Haii\IgisBundle\Entity\User

7.Import route from FOSBundle by (Haii/IgisBundle/Resources/config/routing.yml) show below
	fos_user_security:
    resource: "@FOSUserBundle/Resources/config/routing/security.xml"

	fos_user_profile:
		resource: "@FOSUserBundle/Resources/config/routing/profile.xml"
		prefix: /profile

	fos_user_register:
		resource: "@FOSUserBundle/Resources/config/routing/registration.xml"
		prefix: /register

	fos_user_resetting:
		resource: "@FOSUserBundle/Resources/config/routing/resetting.xml"
		prefix: /resetting

	fos_user_change_password:
		resource: "@FOSUserBundle/Resources/config/routing/change_password.xml"
		prefix: /profile

8.Import bundle route to global route (app/config/routing.yml)
	haii_igis:
		resource: "@HaiiIgisBundle/Resources/config/routing.yml"
		prefix:   /

9.To test the route is working run (find out 'fos_*' route):
	$ php app/console router:debug

10.Build database schema
	$php app/console doctrine:database:create
	$php app/console doctrine:schema:update --dump-sql
	$ php app/console doctrine:database:drop --force

11.Try to login 
	http://localhost/hgis/web/add_dev.php/login

12.Add User by Command run and provide some information:
	./app/console fos:user:create

13.When done try to login

14.Promote user to another role default role is ROLE_USER by:
	./app/console fos:user:promote

15.Override Login Template 
	1.//src/Haii/HaiiIgisBundle.php add getParent() function
	
