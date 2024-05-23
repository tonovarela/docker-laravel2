echo "------------------------------ "
echo "------------------------------ "
echo "Iniciando aplicacion "
echo "------------------------------ "
echo "------------------------------ "
# composer install

  
if [ "$NODE_ENV" == "production" ] ; then
  (npm run build&)
else
echo "Dev "
  (npm run dev&)
fi
apache2-foreground