/* Typed access to the editable content in src/data/*.json.
   Array order is display order: the first product is the "featured / latest"
   piece that homepage CTAs and hotspots link to. */
import productsJson from "../data/products.json";
import projectsJson from "../data/projects.json";

export interface Product {
  slug: string;
  title: string;
  designer: string;
  price: string;
  category: string;
  isNew: boolean;
  image: string;
  description: string;
}

export interface Project {
  slug: string;
  title: string;
  location: string;
  category: string;
  image: string;
  description: string;
}

export const SITE_NAME = "Kudu Living";

export const products: Product[] = productsJson;
export const projects: Project[] = projectsJson;

export const featuredProductUrl = products.length ? `/product/${products[0].slug}/` : "/collections/";

/** Site image under /assets/img/site/ (matches the original theme's kudu_img()). */
export const img = (path: string) => `/assets/img/site/${path.replace(/^\/+/, "")}`;
