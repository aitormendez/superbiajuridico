// import external dependencies
import 'jquery'

// Import everything from autoload
import './autoload/**/*'
import { library, dom } from '@fortawesome/fontawesome-svg-core'
import {
  faComment,
  faNewspaper,
  faGavel,
  faGraduationCap,
  faPenFancy,
  faArrowRight,
  faArrowLeft,
} from '@fortawesome/free-solid-svg-icons'

var faArrowAltDown = {
  prefix: 'fas',
  iconName: 'arrow-alt-down',
  icon: [
    512,
    512,
    [],
    'e001',
    'M83,12 L83,128 L12.1,128 C1.4,128 -4,141 3.6,148.5 L118.5,262.8 C123.2,267.5 130.7,267.5 135.4,262.8 L250.3,148.5 C257.9,140.9 252.5,128 241.8,128 L171,128 L171,12 C171,5.4 165.6,0 159,0 L95,0 C88.4,0 83,5.4 83,12 Z',
  ],
}

library.add(faComment, faNewspaper, faGavel, faGraduationCap, faArrowAltDown, faPenFancy, faArrowRight, faArrowLeft)
dom.watch()

// import local dependencies
import Router from './util/Router'
import common from './routes/common'
import home from './routes/home'
import aboutUs from './routes/about'
import pContact from './routes/p-contact'
import archive from './routes/archive'
import presentacion from './routes/presentacion'
import search from './routes/search'

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  pContact,
  archive,
  presentacion,
  search,
})

// Load Events
jQuery(document).ready(() => routes.loadEvents())
