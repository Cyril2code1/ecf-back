##############
### README ###
##############


#INSTALLATION
#############

Serveur:
- s'assurer que l'hebergement utilise un SGBD MySQL
- utiliser un client fTP (ex: Filezilla) pour copier les fichiers sources sur le serveur

Local:
- utiliser MySQL
- s'assurer que la version php utilisée soit supérieur à 7.4
- copier les fichiers sources à l'emplacement désiré

Serveur/Local
- créer une base de donnée
- importer le fichier cw_trt_conseils.sql présent dans le dossier annexe.
	*Ce fichier créera les tables nécessaires au fonctionnement de l'application.
	*Il créera aussi un compte administrateur
- modifier les données du fichier db_const.php contenu dans le dossier [conf]
		



