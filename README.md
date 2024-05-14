# UIET Website Repo

This is the official repository of the UIET website. This is official account of UIETJU.

## Warning
All the changes done on the main branch are directly reflected on the website, so please commit changes only to test branch and then push
your changes to test branch and create a merge request that would be approved by the admin. 

Don't push anything to the main branch directly. Push it to test branch so others can test it on their local machines before pushing it to 
main branch and hence to the website directly.

## Directory structure 
Please follow the Directory structure and upload the documents to correct directories. 


## How to change branch and push changes

1. `git branch` will show all the branches of the repo. two will be `main` and `dev`.
2. use commat `git checkout branch-name` to change to that branch. e.g.  `git checkout dev`.
3. commit to branch by using command `git commit -m "message"` or use your IDE/Text Editor like VScode to do the commit and push automatically for you.
4. create a pull request and wait to get approved by admin.

- Here main is the default branch where the production code will stay while dev is where the development code can be pushed safetly.
