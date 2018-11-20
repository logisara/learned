from fabric.api import*
env.user='ndot'
env.password='Sy$Adm#Cl0ud18'
trunkname=raw_input('trunkname:')
savedname=raw_input('savedname:')
with cd('/home/ndot/Desktop'):
	run('svn export http://192.168.3.243:9880/'+trunkname+'/trunk' +savedname+')
	