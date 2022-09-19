import React from 'react';
import Footer from 'gatsby-theme-carbon/src/components/Footer';

const Content = ({ buildTime }) => (
  <></>
);

const links = {
  firstCol: [],
  secondCol: [],
};

const CustomFooter = () => <Footer links={links} Content={Content} Logo={() => (<></>)} />;

export default CustomFooter;
