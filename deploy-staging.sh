chmod 600 /tmp/reconasia_rsa
eval "$(ssh-agent -s)" # Start the ssh agent
ssh-add /tmp/reconasia_rsa
git remote add reconasia-staging git@git.wpengine.com:production/reconasiastaging.git # add remote for staging site
git fetch --unshallow # fetch all repo history or wpengine complain
git status # check git status
git checkout master # switch to master branch
git add wp-content/themes/reconasia/*.css -f # force all compiled CSS files to be added
git add wp-content/themes/reconasia/assets -f # force all compiled JS & optimized images
git add wp-content/plugins/reconasia-blocks/dist -f # force all compiled JS for blocks
git commit -m "Compiled & bundled all assets" # commit the compiled CSS files
git push -f reconasia-staging master #deploy to staging site from master