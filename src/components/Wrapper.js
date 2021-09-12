import React, { useState, useCallback, useEffect } from "react";
import UserCard from "./UserCard";

export default function Wrapper(props) {
  const { attributes } = props;

  /* ****************************************************************************
  All the React logic and hooks must be inside this file and passed down then
  to the components. Do not use React hooks or logic stuff directly in components
  like UserCard, it should be here in the Wrapper only. You can see we pass down
  the Modal state, Counter state and actions.
  ***************************************************************************** */

  const [count, setCount] = useState(attributes.count);
  const [isModalOpen, setIsModalOpen] = useState(false);
  const toggleModal = useCallback(
    () => setIsModalOpen((prevState) => !prevState),
    []
  );

  useEffect(() => {
    console.log(attributes);
  }, []);

  return (
    <div className="mt-block-user-card" data-mt-attributes={attributes}>
      <UserCard
        attributes={attributes}
        toggleModal={toggleModal}
        isModalOpen={isModalOpen}
        count={count}
        setCount={setCount}
      />
    </div>
  );
}
